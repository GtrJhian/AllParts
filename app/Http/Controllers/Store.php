<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class Store extends Controller
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
                //break;
            default:
                return 'Unknown Param';
                break;
        }
    }
    function jsonItem($id){
        return json_encode(DB::select('SELECT * FROM inventory WHERE item_id= ?',[$id])[0]);
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