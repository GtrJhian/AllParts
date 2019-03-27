<?php

namespace App\Http\Controllers;

use App\SupplierModel;
use App\PurchaseModel;
use App\PurchaseDetailModel;
use App\InventoryPost;
use Illuminate\Http\Request;
use DB;


class PurchasingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = SupplierModel::all();
        $newpurchase = PurchaseModel::find(\DB::table('purchase_order')->max('Order_No'));
        $purchasing = PurchaseModel::with('supplier')->get();
        $inventory = InventoryPost::all();
        $data = [
            'supplier' => $supplier,
            'purchasing' => $purchasing,
            'purchaseid' => $newpurchase,
            'inventory' => $inventory
        ];

        return view('Supply.orders')->with('data',$data);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchasing = new PurchaseModel;
        $purchasedetail = new PurchaseDetailModel;
        $purchasing->Supplier_ID = $request->supplier_id;
        $purchasing->Order_Date = $request->order_date;
        $purchasing->Invoice_No = $request->ref_inv;
        $purchasing->Amount = $request->pur_amount;
        $purchasing->save();

        for($i = 0; $i < sizeof($request->quantity); $i++){
            $purchasedetail->Order_No = $request->order_no;
            $purchasedetail->Item_ID = $request->itemcode[$i];
            $purchasedetail->Quantity = $request->quantity[$i];
            $purchasedetail->Unit = $request->unit[$i];
            $purchasedetail->Unit_Price = $request->uprice[$i];
            $purchasedetail->save();
        };
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
