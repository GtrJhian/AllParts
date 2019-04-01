<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use DateTime;



class SaleData{
    public function __construct($cusID, $items, $amountPayed, $termOfPayment){
        $this->updateAllPackages();
        $this->cusID = $cusID;
        $this->items = $items;
        $this->date=(new DateTime())->format('Y-m-d');
        $this->termOfPayment = $termOfPayment;
        $this->vat_sales = 0;
        foreach($this->items as $item_id => $quantity){
            $this->vat_sales += DB::select('SELECT Item_Price FROM inventory WHERE item_id = ?', [$item_id])[0]->Item_Price * $quantity;
        }
        $this->vat_amount = round($this->vat_sales * 0.0112,2,PHP_ROUND_HALF_UP);
        $this->debit = $this->vat_sales + $this->vat_amount;

        $this->credit = $amountPayed > $this->debit ? $this->debit : $amountPayed;
    }
    public function validate(){
        $errors = array();
        $isValid = true;

        //============Payment Validation================//

        if((strtoupper($this->termOfPayment) == "CASH" || strtoupper($this->termOfPayment) == "CHECK")&&
            $this->debit>$this->credit){
                $isValid = false;
                array_push($errors, "Insufficient Payment for CASH/CHECK");
        }
            

        //============cusID validation=================//
        if(count(DB::select('SELECT * FROM customer WHERE Cus_ID = ?',[$this->cusID]))==0){
            //return ["isValid" => false , "error" => "Invalid cusID: ".$this->cusID];
            $isValid = false;
            array_push($errors, "Invalid Customer");
        }

        //=============items Validation===============//
        
        $items_assoc = array();

        foreach($this->items as $item_id => $quantity){
            if($quantity <= 0) continue;
            if(DB::select('SELECT Item_Type FROM inventory WHERE item_id = ?', [$item_id])[0]->Item_Type==1){
                $items = DB::select('SELECT needed_item, needed_quantity FROM item_packages WHERE item_id = ?',[$item_id]);
                foreach($items as $item){
                    if(isset($items_assoc[$item->needed_item])){
                        $items_assoc[$item->needed_item] += $item->needed_quantity * $quantity;
                    }else{
                        $items_assoc[$item->needed_item] = $item->needed_quantity * $quantity;
                    }
                }
            }else{
                if(isset($items_assoc[$item_id])){
                    $items_assoc[$item_id] += $quantity;
                }else{
                    $items_assoc[$item_id] = $quantity;
                }
            }
        }

        if(count($items_assoc)==0){
            //return ["isValid" => false , "error" => "No items."];
            $isValid = false;
            array_push($errors, "No items");
        }

        $this->items_assoc = $items_assoc;

        foreach($items_assoc as $item_id => $quantity){
            $result = DB::select('SELECT Item_Quantity, Item_Code, Item_Quantity FROM inventory WHERE item_id = ?', [$item_id])[0];
            if($result->Item_Quantity<$quantity){
                $isValid = false;
                array_push($errors, "Insufficient stock of $result->Item_Code. $result->Item_Quantity remaining, $quantity needed");
            }
        }
        $this->isValid = $isValid;
        return ["isValid" => $isValid , "errors" => $errors];
    }

    function Submit(){
        $this->validate();
        if(!$this->isValid) return back();
        DB::insert('INSERT INTO sale(Cus_ID,Sale_Date,term_of_payment,debit,Vat_sales,Vat_amount,credit,Sale_Archived) VALUES(?,?,?,?,?,?,?,?)', 
                                    [
                                        $this->cusID,
                                        $this->date,
                                        $this->termOfPayment,
                                        $this->debit,
                                        $this->vat_sales,
                                        $this->vat_amount,
                                        $this->credit,
                                        0
                                    ]);
        $sale_id = DB::getPdo()->lastInsertId();
        
        foreach($this->items as $item_id => $quantity){
            $item = DB::select('SELECT Item_Unit, Item_Price FROM inventory WHERE Item_Id = ?',[$item_id])[0];
            DB::insert('INSERT INTO sale_detail(Sale_ID,Item_ID,Quantity,Unit,Unit_Price) VALUES(?,?,?,?,?)',
                                                [
                                                    $sale_id, 
                                                    $item_id, 
                                                    $quantity, 
                                                    $item->Item_Unit, 
                                                    $item->Item_Price
                                                ]);
        }

        foreach($this->items_assoc as $item_id => $quantity){
            DB::update('UPDATE inventory SET Item_Quantity = Item_Quantity - ? WHERE Item_ID = ?', [$quantity, $item_id]);
        }

        DB::insert('INSERT INTO accounting(sale_id,acc_date,acc_payment) VALUES(?,?,?)',
                                            [
                                                $sale_id,
                                                $this->date,
                                                $this->credit
                                            ]);
        $this->updateAllPackages();
        return back();
    }
    //=====Properties
    public $debit;
    public $credit;
    public $vat_sales;
    public $vat_amount;

    private function updateAllPackages(){
        $packages = DB::table('inventory')->where('Item_Type', 1)->get();
        foreach($packages as $package){
            $pid=$package->Item_ID;
            $records = DB::table('item_packages')->where('item_id', $pid)->get();
            $realQuantity=9999;
            foreach($records as $record){
                $itemdetails = DB::table('inventory')->where('Item_ID', $record->needed_item)->first();
                if($itemdetails->archive==0){   //check if archive item, if yes, 0 quantity auto
                    $actualQuantity=floor(($itemdetails->Item_Quantity)/($record->needed_quantity));
                    if($actualQuantity<$realQuantity){
                        $realQuantity=$actualQuantity;
                    }
                }
                else{
                    $realQuantity=0;
                }
            }
            $data=array('Item_Quantity'=>$realQuantity);
            DB::table('inventory')->where('Item_ID',$pid)->update($data);
        }
    }
}



class StoreController extends Controller
{
    //
    function json($param){
        if(!$this->auth()) return "Missing page";
        switch($param){
            case 'inventory':
                
                $result = DB::select('SELECT * FROM inventory');
                return $this->getDatatable($result);
                break;
            case 'checksum':
                $result = DB::select('CHECKSUM TABLE inventory')[0]->Checksum;                
                break;
            case 'itemlistdt':
                $result = DB::select('SELECT item_code,item_price,item_unit,item_quantity,item_id FROM inventory');
                $dt['data'] = array();
                $x = 0;
                foreach($result as $item){
                    $y = 0;
                    $i = json_decode(json_encode($item),false);
                    $dt['data'][$x] = array();
                    foreach($i as $col){
                        $dt['data'][$x][$y] = array();
                        $dt['data'][$x][$y++] = $col;
                    }
                    $x++;
                }
                return $dt;
            case 'itemlistdt2':
                $result = DB::select('SELECT item_code,item_description,item_quantity, concat(item_price,\'/\',item_unit) FROM inventory');
                $dt['data'] = array();
                $x = 0;
                foreach($result as $item){
                    $y = 0;
                    $i = json_decode(json_encode($item),false);
                    $dt['data'][$x] = array();
                    foreach($i as $col){
                        $dt['data'][$x][$y] = array();
                        $dt['data'][$x][$y++] = $col;
                    }
                    $x++;
                }
                return $dt;
            break;
                //break;
            default:
                return 'Unknown Param';
                break;
        }
    }
    function jsonItem($id){
        return json_encode(DB::select('SELECT * FROM inventory WHERE item_id= ?',[$id])[0]);
    }

    function Submit(Request $request){
        if(!$request->has('items')){
            return ["isValid" => false , "errors" => ["No Items Added."]];
        }
        $sale = new SaleData($request->input('Cus_ID'), $request->input('items') ,$request->input('amountPayed') ,$request->input('termOfPayment'));
        return $sale->Submit();
    }
    function ValidateForm(Request $request){
        if(!$request->has('items')){
            $errors =array("No Items Added.");
            $message = json_decode('{}');
            $message->isValid = false;
            $message->errors = $errors;
            return json_encode($message);
        }
        $sale = new SaleData($request->input('Cus_ID'), $request->input('items') ,$request->input('amountPayed') ,$request->input('termOfPayment'));
        return json_encode($sale->validate());
    }

    private function auth(){
        return true;
    }
    private function getDatatable($result){
        $return['data'] = array();
        $x=0;
        foreach($result as $item){
            $i = json_decode(json_encode($item),false);
            $y=0;
            $return['data'][$x] = array();
            foreach($i as $col){
                $return['data'][$x][$y] = array();
                $return['data'][$x][$y++] = $col;
            }
            $x++;
        }
        return $return;
    }
}
