<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InventoryPost;
use DB;
use App\Quotation;
use Session;

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

    /* Create Item Function */
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

            $data=array('Item_Category'=>$icateg,'Item_Brand'=>$ibr,'Item_Code'=>$icode,'Item_Description'=>$idesc,'Item_Type'=>0,'Alarm_Quantity'=>$iaquan,'Item_Quantity'=>$iquan,'Item_Unit'=>$iunit,'Item_Price'=>$ipri,'archive'=>0);
            DB::table('inventory')->insert($data);

            return redirect()->back()->with('alert', $icode.' Added to Inventory!');
        }
        else{

            return redirect()->back()->with('alert', $icode.' Already Exists!');   
        }
    }


    /* Create Brand Function */
    function createBrand(Request $req)
    {
        $bname=$req->input('bn');
        $exist = DB::table('item_brands')->where('brand_name', $bname)->first();
        if ($exist === null) {
   // user doesn't exist

            $data=array('brand_name'=>$bname,'archive'=>0);
            DB::table('item_brands')->insert($data);

            return redirect()->back()->with('alert', 'Created '.$bname.' Brand!');
        }
        else{

            return redirect()->back()->with('alert', $bname.' Already Exists!');   
        }
    }

    /* Create Category Function */
    function createCategory(Request $req)
    {
        $cname=$req->input('cn');
        $exist = DB::table('item_categories')->where('item_category', $cname)->first();
        if ($exist === null) {
   // user doesn't exist

            $data=array('item_category'=>$cname,'archive'=>0);
            DB::table('item_categories')->insert($data);

            return redirect()->back()->with('alert', 'Created '.$cname.' Category!');
        }
        else{

            return redirect()->back()->with('alert', $cname.' Already Exists!');   
        }
    }

    /*Populate Update Item Form Function*/
    function popItemForm(Request $req)
    {

        $itemID=$req->input('itemID');
        $iteminfo = DB::table('inventory')->where('Item_ID',$itemID)->get(); 
        echo json_encode($iteminfo);
    } 


    /*Populate Update Brand Form Function*/
    function popBrandForm(Request $req)
    {

        $brandID=$req->input('brandID');
        $brandinfo = DB::table('item_brands')->where('brand_id',$brandID)->get(); 
        echo json_encode($brandinfo);
    } 


    /*Populate Update Category Form Function*/
    function popCategoryForm(Request $req)
    {

        $categoryID=$req->input('categoryID');
        $categoryinfo = DB::table('item_categories')->where('category_id',$categoryID)->get(); 
        echo json_encode($categoryinfo);
    } 



    //update Item
    function updateItem(Request $req)
    {
        $iid=$req->input('uid');
        $icode=$req->input('ic');
        $idesc=$req->input('id');
        $ibr=$req->input('ib');
        $icateg=$req->input('icat');
        $ipri=$req->input('ip');
        $iunit=$req->input('iuom');
        $iquan=$req->input('iq');
        $iaquan=$req->input('iaq');

        $data=array('Item_Category'=>$icateg,'Item_Brand'=>$ibr,'Item_Code'=>$icode,'Item_Description'=>$idesc,'Item_Type'=>0,'Alarm_Quantity'=>$iaquan,'Item_Quantity'=>$iquan,'Item_Unit'=>$iunit,'Item_Price'=>$ipri);
        DB::table('inventory')->where('Item_ID',$iid)->update($data);

        return redirect()->back()->with('alert', 'Updated Item '.$icode.' info!');
        
    }

    /* Update Brand Function */
    function updateBrand(Request $req)
    {
        $bid=$req->input('bid');
        $bname=$req->input('ubn');
        $data=array('brand_name'=>$bname,'archive'=>'0');
        DB::table('item_brands')->where('brand_id',$bid)->update($data);

        return redirect()->back()->with('alert', 'Updated '.$bname.' Brand!');

    }

    /* Update Category Function */
    function updateCategory(Request $req)
    {
        $cid=$req->input('cid');
        $cname=$req->input('ucn');
        $data=array('item_category'=>$cname,'archive'=>'0');
        DB::table('item_categories')->where('category_id',$cid)->update($data);

        return redirect()->back()->with('alert', 'Updated '.$cname.' Category!');

    }

    //archive Item
    function archiveItem(Request $req)
    {
        $iid=$req->input('aid');
        $iic=$req->input('aic');

        $data=array('archive'=>'1');
        DB::table('inventory')->where('Item_ID',$iid)->update($data);

        return redirect()->back()->with('alert', 'Archived Item '.$iic);
        
    }

    //archive Brand
    function archiveBrand(Request $req)
    {
        $ibid=$req->input('abid');
        $ibn=$req->input('abn');
        $data=array('archive'=>'1');
        DB::table('item_brands')->where('brand_id',$ibid)->update($data);

        return redirect()->back()->with('alert', 'Archived Brand '.$ibn);
        
    }

    //archive Category
    function archiveCategory(Request $req)
    {
        $icid=$req->input('acid');
        $iic=$req->input('aicat');

        $data=array('archive'=>'1');
        DB::table('item_categories')->where('category_id',$icid)->update($data);

        return redirect()->back()->with('alert', 'Archived Category '.$iic);
        
    }

     //unarchive Item
    function unarchiveItem(Request $req)
    {
        $iid=$req->input('aid');
        $iic=$req->input('aic');

        $data=array('archive'=>'0');
        DB::table('inventory')->where('Item_ID',$iid)->update($data);

        return redirect()->back()->with('alert', 'Restored Item '.$iic);
        
    }


    //archive Brand
    function unarchiveBrand(Request $req)
    {
        $ibid=$req->input('abid');
        $ibn=$req->input('abn');
        $data=array('archive'=>'0');
        DB::table('item_brands')->where('brand_id',$ibid)->update($data);

        return redirect()->back()->with('alert', 'Restored Brand '.$ibn);
        
    }

    //archive Category
    function unarchiveCategory(Request $req)
    {
        $icid=$req->input('acid');
        $iic=$req->input('aicat');

        $data=array('archive'=>'0');
        DB::table('item_categories')->where('category_id',$icid)->update($data);

        return redirect()->back()->with('alert', 'Restored Category '.$iic);
        
    }
}
