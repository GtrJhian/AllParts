<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\BillingPost;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $billingpost = BillingPost::all();
        // return view('billing.index')->with('billingposts', $billingposts);
        $dataIndex = DB::table('sale')
                ->join('customer','customer.Cus_ID', 'sale.Cus_ID')
                ->join('accounting', 'accounting.Sale_ID', 'sale.Sale_ID')
                ->select('F_Name', 'L_Name', 'Company', 'Address', 'TR_Acc')
                ->get();

        return view('billing.index')->with('indexPost', $dataIndex);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $dataShow = (array)DB::table('accounting')
        //             ->join('sale', 'accounting.Sale_ID', 'sale.Sale_ID')
        //             ->join('customer','sale.Cus_ID', 'customer.Cus_ID')
        //             ->select('customer.Cus_ID', 'F_Name', 'L_Name', 'Company', 'Address', 'TR_Acc', 'Balance', 'sale.Sale_ID')
        //             ->where('TR_Acc', $id)
        //             ->first();

        // $dataShowDet = DB::table('sale_detail')
        //             ->join('sale', 'sale.Sale_ID', 'sale_detail.Sale_ID')
        //             ->join('inventory', 'inventory.Item_ID', 'sale_detail.Item_ID')
        //             ->select('sale_detail.Item_ID', 'Quantity', 'Unit', 'Unit_Price', 'Item_Description')
        //             ->where('sale_detail.Sale_ID', $dataShow['Sale_ID'])
        //             ->get();

        // $data = array(
        //     'dataShow'=>$dataShow,
        //     'dataShowDet' => $dataShowDet
        // );
        $result = array(
            "name" => "Fred",
            "age" => "21"
        );
        //return view('billing.show')->with('showPost', $data);
        //return view('billing.index');
        return Response::json($result);
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
