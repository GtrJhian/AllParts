<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BillingPost extends Model
{
    //Table Name
    protected $table = 'sale';
    //Primary Key
    public $primaryKey = 'Cus_ID';

    public static function billingQuery($month, $archived)
    {
        $billingData = DB::table('sale')
                        ->join('customer','customer.Cus_ID', 'sale.Cus_ID')
                        ->select('sales_invoice_no', 'F_Name', 'L_Name', 'Company', 'Address', 'Sale_Date', 'debit', 'credit', 'term_of_payment', 'Vat_sales')
                        ->where('Sale_Archived', '=', $archived)
                        ->whereMonth('Sale_Date', '=', $month)
                        ->orderBy('sale.sales_invoice_no');
        return $billingData;
    }

    public static function billingQueryAll($archived)
    {
        $billingData = DB::table('sale')
                        ->join('customer','customer.Cus_ID', 'sale.Cus_ID')
                        ->select('sales_invoice_no', 'F_Name', 'L_Name', 'Company', 'Address', 'Sale_Date', 'debit', 'credit', 'term_of_payment', 'Vat_sales')
                        ->where('Sale_Archived', '=', $archived)
                        ->orderBy('sale.sales_invoice_no');
        return $billingData;
    }
}
