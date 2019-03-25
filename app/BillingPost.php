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

    public static function billingQuery()
    {
        $billingData = DB::table('sale')
                        ->join('customer','customer.Cus_ID', 'sale.Cus_ID')
                        ->select('F_Name', 'L_Name', 'Company', 'Address', 'sale.Sale_ID', 'debit', 'credit')
                        ->where('Sale_Archived', '=', '0')
                        ->orderBy('sale.Sale_ID');
        return $billingData;
    }
}
