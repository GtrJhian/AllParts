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

    /*-----------------------------------------------------------------------------------*/
    
    /*function updates all packages*/
    public function updateAllPackages(){
        $packages = DB::table('inventory')->where('Item_Type', 1)->get();
        foreach($packages as $package){
            $pid=$package->Item_ID;
            $records = DB::table('item_packages')->where('item_id', $pid)->get();
            $realQuantity=9999;
            foreach($records as $record){
                $itemdetails = DB::table('inventory')->where('Item_ID', $record->needed_item)->first();
                if($itemdetails->archive==0){   //check if archive item, if yes, 0 quantity auto
                    $actualQuantity=($itemdetails->Item_Quantity)/($record->needed_quantity);
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

    /*-----------------------------------------------------------------------------------*/
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

    /*-----------------------------------------------------------------------------------*/
    /*create package*/
    function createPackage(Request $req)
    {
        $pcode=$req->input('pc');
        $pdesc=$req->input('pd');
        $pbr=$req->input('pb');
        $pcateg=$req->input('pcat');
        $ppri=$req->input('pp');
        $punit="Set";
        $itemnum=$req->input('ItemList');

       // $pquan=$req->input('pq');
        $paquan=0;
        $exist = DB::table('inventory')->where('Item_Code', $pcode)->first();
        if ($exist === null) {
   // user doesn't exist

       //initialize inventory data    
            $data=array('Item_Category'=>$pcateg,'Item_Brand'=>$pbr,'Item_Code'=>$pcode,'Item_Description'=>$pdesc,'Item_Type'=>1,'Alarm_Quantity'=>$paquan,'Item_Unit'=>$punit,'Item_Price'=>$ppri,'archive'=>0);
            DB::table('inventory')->insert($data);


        //add items to package list
            $getID = DB::table('inventory')->where('Item_Code', $pcode)->first();
            $pid=$getID->Item_ID;
            for ($x = 0; $x <$itemnum ; $x++) {
                $icode = $req->input('in-'.$x);
                $result = DB::table('inventory')->where('Item_Code', $icode)->first();
                $iid=$result->Item_ID;
                $iquantity = $req->input('iq-'.$x);
                $data=array('item_id'=>$pid,'needed_item'=>$iid,'needed_quantity'=>$iquantity);
                DB::table('item_packages')->insert($data);
            }

            //update packages function
            $this->updateAllPackages();
            return redirect()->back()->with('alert', $pcode.' Package added to Inventory!');
        }
        else{
            return redirect()->back()->with('alert', $pcode.' Already Exists!');   
        }
    }

    /*-----------------------------------------------------------------------------------*/
    /* Create Brand Function */
    function createBrand(Request $req)
    {
        $bname=$req->input('bn');
        $exist = DB::table('item_brands')->where('brand_name', $bname)->first();
        if ($exist === null) {
          if ($req->hasFile('brand_img')) {
              $image = $req->file('brand_img');
              $name = time().'.'.$image->getClientOriginalExtension();
              $destinationPath = public_path('/inventory/brand_pics');
              $image->move($destinationPath, $name);
              $finalPath = '/inventory/brand_pics/'.$name;
              $data=array('pic_url'=>$finalPath,'archive'=>0);
              DB::table('item_pics')->insert($data);
              $pic_id=DB::table('item_pics')->where('pic_url',$finalPath)->first();
              $data=array('brand_name'=>$bname,'brand_pic'=>$pic_id->pic_id,'archive'=>0);
              DB::table('item_brands')->insert($data);
          }
          else{ 
              $data=array('brand_name'=>$bname,'archive'=>0,'brand_pic'=>NULL);
              DB::table('item_brands')->insert($data);
          }

          return redirect()->back()->with('alert', 'Created '.$bname.' Brand!');

      }
      else{
        return redirect()->back()->with('alert', $bname.' Already Exists!');   
    }
}

/*-----------------------------------------------------------------------------------*/
/* Create Category Function */
function createCategory(Request $req)
{
    $cname=$req->input('cn');
    $exist = DB::table('item_categories')->where('item_category', $cname)->first();
    if ($exist === null) {
      if ($req->hasFile('categ_img')) {
        $image = $req->file('categ_img');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/inventory/category_pics');
        $image->move($destinationPath, $name);
        $finalPath = '/inventory/category_pics/'.$name;
        $data=array('pic_url'=>$finalPath,'archive'=>0);
        DB::table('item_pics')->insert($data);
        $pic_id=DB::table('item_pics')->where('pic_url',$finalPath)->first();
        $data=array('item_category'=>$cname,'categ_pic'=>$pic_id->pic_id,'archive'=>0);
        DB::table('item_categories')->insert($data);
    }
    else{ 
        $data=array('item_category'=>$cname,'categ_pic'=>NULL,'archive'=>0);
        DB::table('item_categories')->insert($data);
    }
    return redirect()->back()->with('alert', 'Created '.$cname.' Category!');
}
else{
    return redirect()->back()->with('alert', $cname.' Already Exists!');   
}
}

/*-----------------------------------------------------------------------------------*/
/*Populate Update Item Form Function*/
function popItemForm(Request $req)
{
    $itemID=$req->input('itemID');
    $iteminfo = DB::table('inventory')->where('Item_ID',$itemID)->get(); 
    echo json_encode($iteminfo);
} 

/*-----------------------------------------------------------------------------------*/
/*Populate list of items in packages Form Function*/
function popPckgList(Request $req)
{
    $itemID=$req->input('itemID');
    $iteminfo=DB::table('inventory')->where('Item_ID',$itemID)->first();
    $itemlists = DB::table('item_packages')->where('item_id',$itemID)->get(); 
    $output="";
    $i=0;
    foreach($itemlists as $itemlist){
      $pid=DB::table('inventory')->where('Item_ID',$itemlist->needed_item)->first();
      $output.="<div class='row'><div class='col-sm-6'><label>Item Code:</label><input class='form-control' list='items' name='pin-".$i."' size='50' maxlength='50' value='".$pid->Item_Code."'></div>
      <div class='form-group col-sm-6'><label>Quantity Needed:</label><input class='form-control' type='number' name='piq-".$i."' size='6' maxlength='6' min='1' required value=".$itemlist->needed_quantity."></div>
      </div><input class='form-control' type='number' name='pli-".$i."' maxlength=3 min=1 value=".$itemlist->needed_item." hidden>";
      $i++;
  }
  $output.="<input class='form-control' type='number' name='PckgList' maxlength=3 min=1 value=".$i." hidden><input class='form-control' type='text' name='PckgID' value=".$itemID." hidden><input class='form-control' type='text' name='PckgCode' value=".$iteminfo->Item_Code." hidden>";
  echo $output;

} 


/*-----------------------------------------------------------------------------------*/
/*Populate Update Brand Form Function*/
function popBrandForm(Request $req)
{
    $brandID=$req->input('brandID');
    $brandinfo = DB::table('item_brands')->where('brand_id',$brandID)->get(); 
    echo json_encode($brandinfo);
} 

/*-----------------------------------------------------------------------------------*/
/*Populate Update Category Form Function*/
function popCategoryForm(Request $req)
{
    $categoryID=$req->input('categoryID');
    $categoryinfo = DB::table('item_categories')->where('category_id',$categoryID)->get(); 
    echo json_encode($categoryinfo);
} 

/*-----------------------------------------------------------------------------------*/
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

        //update packages function
    $this->updateAllPackages();
    return redirect()->back()->with('alert', 'Updated Item '.$icode.' info!');

}


/*-----------------------------------------------------------------------------------*/
    //update Package Info
function updatePckgInfo(Request $req)
{

    $iid=$req->input('upd');
    $icode=$req->input('pc');
    $idesc=$req->input('pd');
    $ibr=$req->input('pb');
    $icateg=$req->input('pcat');
    $ipri=$req->input('pp');

    $data=array('Item_Category'=>$icateg,'Item_Brand'=>$ibr,'Item_Code'=>$icode,'Item_Description'=>$idesc,'Item_Type'=>1,'Item_Price'=>$ipri);
    DB::table('inventory')->where('Item_ID',$iid)->update($data);

        //update packages function
    $this->updateAllPackages();

    return redirect()->back()->with('alert', 'Updated Package '.$icode.' info!');

}

/*-----------------------------------------------------------------------------------*/
    //update Package Info
function updatePckgList(Request $req)
{
    $pno=$req->input('PckgList');
    $pid=$req->input('PckgID');
    $pc=$req->input('PckgCode');
    for ($x = 0; $x <$pno ; $x++) {
        $itemID = $req->input('pli-'.$x);
        $icode = $req->input('pin-'.$x);
        $result = DB::table('inventory')->where('Item_Code', $icode)->first();
        $iid = $result->Item_ID;
        $iquantity = $req->input('piq-'.$x);
        $data=array('item_id'=>$pid,'needed_item'=>$iid,'needed_quantity'=>$iquantity);
        DB::table('item_packages')->where('item_id',$pid)->where('needed_item',$itemID)->update($data);
    }

            //update packages function
    $this->updateAllPackages();     
    return redirect()->back()->with('alert', 'Updated Package '.$pc.' item list!');

}

/*-----------------------------------------------------------------------------------*/
/* Update Brand Function */
function updateBrand(Request $req)
{
    $bid=$req->input('bid');
    $bname=$req->input('ubn');
    if ($req->hasFile('brand_img')) {
      $image = $req->file('brand_img');
      $name = time().'.'.$image->getClientOriginalExtension();
      $destinationPath = public_path('/inventory/brand_pics');
      $image->move($destinationPath, $name);
      $finalPath = '/inventory/brand_pics/'.$name;
      $data=array('pic_url'=>$finalPath,'archive'=>0);
      DB::table('item_pics')->insert($data);
      $pic_id=DB::table('item_pics')->where('pic_url',$finalPath)->first();
      $data=array('brand_name'=>$bname,'brand_pic'=>$pic_id->pic_id,'archive'=>0);
      DB::table('item_brands')->where('brand_id',$bid)->update($data);
  }
  else{
    $data=array('brand_name'=>$bname,'archive'=>'0');
    DB::table('item_brands')->where('brand_id',$bid)->update($data);
}
return redirect()->back()->with('alert', 'Updated '.$bname.' Brand!');
}

/*-----------------------------------------------------------------------------------*/
/* Update Category Function */
function updateCategory(Request $req)
{
    $cid=$req->input('cid');
    $cname=$req->input('ucn');
    
    if ($req->hasFile('categ_img')) {
        $image = $req->file('categ_img');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/inventory/category_pics');
        $image->move($destinationPath, $name);
        $finalPath = '/inventory/category_pics/'.$name;
        $data=array('pic_url'=>$finalPath,'archive'=>0);
        DB::table('item_pics')->insert($data);
        $pic_id=DB::table('item_pics')->where('pic_url',$finalPath)->first();
        $data=array('item_category'=>$cname,'categ_pic'=>$pic_id->pic_id,'archive'=>0);
        DB::table('item_categories')->where('category_id',$cid)->update($data);
    }
    else{
        $data=array('item_category'=>$cname,'archive'=>'0');
        DB::table('item_categories')->where('category_id',$cid)->update($data);
    }
    return redirect()->back()->with('alert', 'Updated '.$cname.' Category!');
}

/*-----------------------------------------------------------------------------------*/
    //archive Item
function archiveItem(Request $req)
{
    $iid=$req->input('aid');
    $iic=$req->input('aic');
    $data=array('archive'=>'1');
    DB::table('inventory')->where('Item_ID',$iid)->update($data);
    return redirect()->back()->with('alert', 'Archived Item '.$iic);

}

/*-----------------------------------------------------------------------------------*/
    //archive Brand
function archiveBrand(Request $req)
{
    $ibid=$req->input('abid');
    $ibn=$req->input('abn');
    $data=array('archive'=>'1');
    DB::table('item_brands')->where('brand_id',$ibid)->update($data);
    return redirect()->back()->with('alert', 'Archived Brand '.$ibn);

}

/*-----------------------------------------------------------------------------------*/
    //archive Category
function archiveCategory(Request $req)
{
    $icid=$req->input('acid');
    $iic=$req->input('aicat');
    $data=array('archive'=>'1');
    DB::table('item_categories')->where('category_id',$icid)->update($data);
    return redirect()->back()->with('alert', 'Archived Category '.$iic);

}

/*-----------------------------------------------------------------------------------*/
     //unarchive Item
function unarchiveItem(Request $req)
{
    $iid=$req->input('aid');
    $iic=$req->input('aic');
    $data=array('archive'=>'0');
    DB::table('inventory')->where('Item_ID',$iid)->update($data);
    return redirect()->back()->with('alert', 'Restored Item '.$iic);

}

/*-----------------------------------------------------------------------------------*/
     //delete Item
function deleteItem(Request $req)
{
    $iid=$req->input('did');
    $iic=$req->input('dic');
    $item_info=DB::table('inventory')->where('Item_ID',$iid)->first();

    if($item_info->Item_Type==0){
  //          $checker=DB::table('item_packages')->where('item_id',$iid)->first();
        if(DB::table('item_packages')->where('needed_item',$iid)->first()){
         return redirect()->back()->with('alert', 'Some Packages are associated to '.$iic. '!'); 
     }
     else{
        DB::table('inventory')->where('Item_ID',$iid)->delete();
        return redirect()->back()->with('alert', 'Permanently Deleted Item '.$iic);
    }
}

else{
    DB::table('item_packages')->where('item_id',$iid)->delete();
    DB::table('inventory')->where('Item_ID',$iid)->delete();
    return redirect()->back()->with('alert', 'Permanently Deleted Package '.$iic);   
}
}

/*-----------------------------------------------------------------------------------*/
    //unarchive Brand
function unarchiveBrand(Request $req)
{
    $ibid=$req->input('abid');
    $ibn=$req->input('abn');
    $data=array('archive'=>'0');
    DB::table('item_brands')->where('brand_id',$ibid)->update($data);
    return redirect()->back()->with('alert', 'Restored Brand '.$ibn);

}


/*-----------------------------------------------------------------------------------*/
    //delete Brand
function deleteBrand(Request $req)
{
    $ibid=$req->input('dbid');
    $ibn=$req->input('dbn');
    DB::table('item_brands')->where('brand_id',$ibid)->delete();
    return redirect()->back()->with('alert', 'Permanently Deleted Brand '.$ibn);

}

/*-----------------------------------------------------------------------------------*/
    //unarchive Category
function unarchiveCategory(Request $req)
{
    $icid=$req->input('acid');
    $iic=$req->input('aicat');
    $data=array('archive'=>'0');
    DB::table('item_categories')->where('category_id',$icid)->update($data);
    return redirect()->back()->with('alert', 'Restored Category '.$iic);
}

/*-----------------------------------------------------------------------------------*/
    //delete Category
function deleteCategory(Request $req)
{
    $icid=$req->input('dcid');
    $iic=$req->input('dicat');
    DB::table('item_categories')->where('category_id',$icid)->delete();
    return redirect()->back()->with('alert', 'Permanently Deleted Category '.$iic);
}


/*-----------------------------------------------------------------------------------*/
//Get Inventory Alerts
function getInvAlerts(Request $req)
{
    $results= DB::table('inventory')->where('archive',0)->where('Item_Type',0)->orderBy('item_code','ASC')->get();
    $output = '';
    $count=0;
    foreach($results as $result){
        if($result->Item_Quantity<=$result->Alarm_Quantity){
            $output .= '
            <li>
            <p>
            <strong>'.$result->Item_Code.'</strong></p><p style=color:red>
            <small><em>';
            if($result->Item_Quantity>0){
                $output .=
                'Running Out('.$result->Item_Quantity.')</em></small>
                </p>
                </li>
                <hr>    
                ';
            }
            else{
              $output .=
              'Out of Stock('.$result->Item_Quantity.')</em></small>
              </p>
              </li>
              <hr>    
              ';  
          }
          $count+=1;
      }
  }
  if($count==0){
    $output .= '<li><a href="#" class="text-bold text-italic">No Alerts :)</a></li>';
}
$record = array(
   'notification' => $output,
   'unseen_notification'  => $count
);

echo json_encode($record);
}


/*-----------------------------------------------------------------------------------*/
//Get Pic URL
function getPic(Request $req){
    $pic_id=$req->input('pic_id');
    $picinfo = DB::table('item_pics')->where('pic_id',$pic_id)->get(); 
    echo json_encode($picinfo);
}


/*-----------------------------------------------------------------------------------*/
//get item information
function viewItem(Request $req){
    $item_id=$req->input('itemID');
    $iteminfo = DB::table('inventory')->where('Item_ID',$item_id)->get(); 
  echo json_encode($iteminfo);
}


}

