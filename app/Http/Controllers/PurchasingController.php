<?php

namespace App\Http\Controllers;

use App\SupplierModel;
use App\PurchaseModel;
use App\PurchaseDetailModel;
use App\InventoryPost;
use Illuminate\Http\Request;
use DB;
use Session;


class PurchasingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){
        $this->middleware(['auth','authSuppliers']);
    }
    public function index()
    {
        $supplier = SupplierModel::all('Supplier_ID','Company_Name');
        // $newpurchase = PurchaseModel::find(\DB::table('purchase_order')->max('Order_No'));
        $newpurchase = PurchaseModel::withTrashed()->orderBy('Order_No','desc')->first();
        if (isset($newpurchase)) {
            $purchaseid = $newpurchase->Order_No;
        } else {
            $purchaseid = 0;
        }
        $purchasing = PurchaseModel::with(['supplier','order_detail'])->orderBy('Order_No','desc')->take(500)->get();
        $purchasing_requistion = PurchaseModel::with(['supplier','order_detail'])->where('Order_Status',0)->orderBy('Order_No','desc')->take(500)->get();
        $purchasing_approved = PurchaseModel::with(['supplier','order_detail'])->where('Order_Status',1)->orderBy('Order_No','desc')->take(500)->get();
        $purchasing_delivered = PurchaseModel::with(['supplier','order_detail'])->where('Order_Status',2)->orderBy('Order_No','desc')->take(500)->get();
        $inventory = InventoryPost::where('Item_Type', 0)->get(['Item_ID','Item_Code','Item_Description','Item_Unit','Item_Quantity']);
        $data = [
            'supplier' => $supplier,
            'purchasing' => $purchasing,
            'purchasing_requistion' => $purchasing_requistion,
            'purchasing_approved' => $purchasing_approved,
            'purchasing_delivered' => $purchasing_delivered,
            'purchaseid' => $purchaseid,
            'inventory' => $inventory,
            'archive' => false
        ];

        return view('Supply.orders')->with('data',$data);
        //
    }

    //View archive
    public function trashed()
    {
        $supplier = SupplierModel::all('Supplier_ID','Company_Name');
        $newpurchase = PurchaseModel::withTrashed()->orderBy('Order_No','desc')->first();
        if (isset($newpurchase)) {
            $purchaseid = $newpurchase->Order_No;
        } else {
            $purchaseid = 0;
        }
        $purchasing = PurchaseModel::onlyTrashed()->with(['supplier','order_detail'])->orderBy('Order_No','desc')->take(500)->get();
        $inventory = InventoryPost::where('Item_Type', 0)->get(['Item_ID','Item_Code','Item_Description','Item_Unit','Item_Quantity']);
        $data = [
            'supplier' => $supplier,
            'purchasing' => $purchasing,
            'purchasing_requistion' => "",
            'purchasing_approved' => "",
            'purchasing_delivered' => "",
            'purchaseid' => $purchaseid,
            'inventory' => $inventory,
            'archive' => true
        ];

        return view('Supply.orders')->with('data',$data);
    }


    public function store(Request $request)
    {
        $state = $request->state;
        if($state == "false"){
            $purchasingDuplicateID = PurchaseModel::withTrashed()->find($request->pur_no);
            if(isset($purchasingDuplicateID)){
                Session::flash('head','Error');
                Session::flash('message','Unable to use Purchase Number because of duplicate entry.');
                return redirect()->back();
            }


            $purchasing = new PurchaseModel;

            $purchasing->Order_No = $request->pur_no;
            $purchasing->Supplier_ID = $request->supplier_id;
            $purchasing->Order_Date = $request->order_date;
            $purchasing->Invoice_No = $request->ref_inv;
            $purchasing->Amount = $request->pur_amount;
            $purchasing->save();

            for($i = 0; $i < sizeof($request->quantity); $i++){
                $purchasedetail = new PurchaseDetailModel;
                $purchasedetail->Order_No = $request->pur_no;
                $purchasedetail->Item_ID = $request->itemcode[$i];
                $purchasedetail->Unit = $request->unit[$i];
                $purchasedetail->Unit_Price = $request->uprice[$i];
                $purchasedetail->Quantity = $request->quantity[$i];

                // DB::table('inventory')->where("Item_ID",$request->itemcode[$i])->increment('Item_Quantity', $request->quantity[$i]);
                // app('App\Http\Controllers\InventoryController')->updateAllPackages();
                $purchasedetail->save();
            };

            Session::flash('head','Success');
            Session::flash('message','Purchase Request submitted successfully.');
            return redirect()->back();
        } else {
            return redirect('/purchasing/edit')->with(['data' => $request->all()]);
        }
    }

    public function edit()
    {
        $data = Session::get('data');
        PurchaseModel::where('Order_No',$data['pur_no'])->update(
            [
                'Supplier_ID'=> $data['supplier_id'],
                'Order_Date'=> $data['order_date'],
                'Invoice_No'=> $data['ref_inv'],
                'Amount'=> $data['pur_amount']
            ]);

        $recentItems = PurchaseDetailModel::where('Order_No',$data['pur_no'])->get();
        foreach ($recentItems as $recentItem) {
            // DB::table('inventory')->where("Item_ID", $recentItem['Item_ID'])->decrement('Item_Quantity', $recentItem['Quantity']);
            // app('App\Http\Controllers\InventoryController')->updateAllPackages();
            $recentItem->forceDelete();
        }

        for($i = 0; $i < sizeof($data['quantity']); $i++){
            $purchasedetail = new PurchaseDetailModel;
            $purchasedetail->Order_No = $data['pur_no'];
            $purchasedetail->Item_ID = $data['itemcode'][$i];
            $purchasedetail->Unit = $data['unit'][$i];
            $purchasedetail->Unit_Price = $data['uprice'][$i];
            $purchasedetail->Quantity = $data['quantity'][$i];

            // DB::table('inventory')->where("Item_ID", $data['itemcode'][$i])->increment('Item_Quantity', $data['quantity'][$i]);
            // app('App\Http\Controllers\InventoryController')->updateAllPackages();
            $purchasedetail->save();
        };
        Session::flash('head','Success');
        Session::flash('message','Purchase Request edited successfully.');
        return redirect()->back();
    }

    //Archive transaction
    public function destroy(Request $request)
    {
        $id = $request->delete_id;
        $purchasing = PurchaseModel::find($id);
        $purchasing->delete();

        $details = PurchaseDetailModel::where('Order_No', $id)->get();
        foreach ($details as $detail) {
            // DB::table('inventory')->where("Item_ID", $detail['Item_ID'])->decrement('Item_Quantity', $detail['Quantity']);
            // app('App\Http\Controllers\InventoryController')->updateAllPackages();
            $detail->delete();
        }

        Session::flash('head','Success');
        Session::flash('message','Purchase Request/Order archived.');
        return redirect()->back();
    }


    //Delete archive
    public function kill($id)
    {
        $details = PurchaseDetailModel::onlyTrashed()->where('Order_No', $id)->get();
        $details->each->forceDelete();

        $purchasing=PurchaseModel::onlyTrashed()->where('Order_No',$id)->first();
        $purchasing->forceDelete();

        Session::flash('head','Success');
        Session::flash('message','Purchase Request/Order removed.');
        return redirect()->back();
    }

    //Restore archive
    public function restore($id)
    {
        $purchasing=PurchaseModel::withTrashed()->where('Order_No',$id)->first();
        $purchasing->restore();

        $details = PurchaseDetailModel::withTrashed()->where('Order_No', $id)->get();
        foreach ($details as $detail) {
            if($purchasing->Order_Status == 2) {
                DB::table('inventory')->where("Item_ID", $detail['Item_ID'])->increment('Item_Quantity', $detail['Quantity']);
                app('App\Http\Controllers\InventoryController')->updateAllPackages();
            }
            $detail->restore();
        }
        Session::flash('head','Success');
        Session::flash('message','Purchase Request/Order restored successfully.');
        return redirect()->route('purchasing.index');
    }

    public function approve($id)
    {
        $purchasing=PurchaseModel::find($id);
        $purchasing->Order_Status = 1;
        $purchasing->save();

        Session::flash('head','Success');
        Session::flash('message','Purchase Request approved.');
        return redirect()->back();
    }

    public function deliver($id)
    {
        $purchasing=PurchaseModel::find($id);
        $purchasing->Order_Status = 2;
        $purchasing->Order_Delivered = date("Y-m-d H:i:s");
        $purchasing->save();

        $purchaseItems = PurchaseDetailModel::withTrashed()->where('Order_No',$id)->get();
        foreach ($purchaseItems as $purchaseItem) {
            DB::table('inventory')->where("Item_ID", $purchaseItem['Item_ID'])->increment('Item_Quantity', $purchaseItem['Quantity']);
            app('App\Http\Controllers\InventoryController')->updateAllPackages();
        }

        Session::flash('head','Success');
        Session::flash('message','Purchase Order delivered.');
        return redirect()->back();
    }

    public function deliver_destroy(Request $request)
    {
        $id = $request->delete_id;
        $purchasing = PurchaseModel::find($id);
        $purchasing->delete();

        $details = PurchaseDetailModel::where('Order_No', $id)->get();
        foreach ($details as $detail) {
            DB::table('inventory')->where("Item_ID", $detail['Item_ID'])->decrement('Item_Quantity', $detail['Quantity']);
            app('App\Http\Controllers\InventoryController')->updateAllPackages();
            $detail->delete();
        }

        Session::flash('head','Success');
        Session::flash('message','Purchase Delivered Order archived.');
        return redirect()->back();
    }
}
