<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AccountingPost extends Model
{
    //Table Name
    protected $table = 'accounting';
    //Primary Key
    public $primaryKey = 'TR_Acc';

    public static function accountingQuery($month)
    {
			$accountingData = DB::table('accounting')
											->join('sale', 'sale.Sale_ID', 'accounting.Sale_ID')
											->select('sales_invoice_no', 'Acc_Date', 'term_of_payment')
											->whereMonth('Sale_Date', '=', $month)
											->orderBy('sale.sales_invoice_no');
											
			return $accountingData;
    }

    public static function accountingQueryAll()
    {
			$accountingData = DB::table('accounting')
												->join('sale', 'sale.Sale_ID', 'accounting.Sale_ID')
												->select('sales_invoice_no', 'Acc_Date', 'term_of_payment')
                        ->orderBy('sale.sales_invoice_no');
			return $accountingData;
    }
}
