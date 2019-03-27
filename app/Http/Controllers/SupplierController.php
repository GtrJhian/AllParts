<?php

namespace App\Http\Controllers;

use App\SupplierModel;
use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = SupplierModel::all();

        return view('Supply.supplier')->with('supplier',$supplier);
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
        // dd($request->all());
        $supplier = new SupplierModel;
        $supplier->Company_Name = $request->companyname;
        $supplier->Company_Address = $request->compaddress;
        $supplier->Company_Contact = $request->companynumber;
        $supplier->Company_Email = $request->companyemail;
        $supplier->TIN_No = $request->companytin;
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
        $supplier = SupplierModel::find($id); 
        return view('Supply.updatesupplier')->with('supplier',$supplier);
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
        $this->validate($request,[
            'companyname'=>'required',
            'companyadd'=>'required',
            'companynumber'=>'required',
            'companyemail'=>'required'
        ]);
        $supplier = SupplierModel::find($id);

        $supplier->Company_Name = $request->companyname;
        $supplier->Company_Address = $request->companyadd;
        $supplier->Company_Contact = $request->companynumber;
        $supplier->Company_Email = $request->companyemail;
        $supplier->TIN_No = $request->companytin;
        $supplier->save(); 
        return redirect()->route('supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = SupplierModel::find($id);
        // dd($supplier);
        $supplier->delete();
        return redirect()->back();
    }
    public function trashed()
    {
        $supplier=SupplierModel::onlyTrashed()->get();
        // dd($supplier);
        return view('Supply.archive_supplier')->with('supplier',$supplier);
    }
    public function kill($id)
    {
        $supplier=SupplierModel::withTrashed()->where('Supplier_ID',$id)->first();
        // dd($supplier);
        $supplier->forceDelete();
        return redirect()->back();
    }
    public function restore($id)
    {
        $supplier=SupplierModel::withTrashed()->where('Supplier_ID',$id)->first();
        // dd($supplier);
        $supplier->restore();
        return redirect()->route('supplier');
    }
     
    
}
