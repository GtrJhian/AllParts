<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InventoryPost;
use DB;
use App\Quotation;


class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inventory()
    {
        $inventoryposts = InventoryPost::all();
        return view('inventory.inventory')->with('inventoryposts', $inventoryposts);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    function createItem(Request $req)
    {
        $icode=$req->input('ic');
        $idesc=$req->input('id');
        $ibr=$req->input('ib');
        $icateg=$req->input('icat');
        $ipri=$req->input('ip');
        $iunit=$req->input('iuom');
        $iquan=$req->input('iq');
        $iaquan=$req->input('iaq');
        $exist = DB::table('inventory')->where('Item_Code', $icode)->first();
            if ($exist === null) {
   // user doesn't exist

                $data=array('Item_Category'=>$icateg,'Item_Brand'=>$ibr,'Item_Code'=>$icode,'Item_Description'=>$idesc,'Item_Type'=>0,'Alarm_Quantity'=>$iaquan,'Item_Quantity'=>$iquan,'Item_Unit'=>$iunit,'Item_Price'=>$ipri);
                DB::table('inventory')->insert($data);

                return redirect()->back()->with('alert', $icode.' Added to Inventory!');
            }
            else{

                return redirect()->back()->with('alert', $icode.' Already Exists!');   
            }
        }
    }
