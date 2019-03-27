<?php

namespace App\Http\Controllers;

use App\SupplierModel;
use App\PurchaseModel;
use App\PurchaseDetailModel;
use Illuminate\Http\Request;

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
        $data = [
            'supplier' => $supplier,
            'purchasing' => $purchasing,
            'purchaseid' => $newpurchase
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
        $supplier->Company_Name = $request->companyname;
        $supplier->Company_Address = $request->compaddress;
        $supplier->Company_Contact = $request->companynumber;
        $supplier->Company_Email = $request->companyemail;
        $supplier->save();
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
