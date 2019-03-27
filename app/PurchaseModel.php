<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseModel extends Model
{
    //Table Name
    protected $table = 'purchase_order';
    //Primary Key
    public $primaryKey = 'Order_No';

    public function supplier()
    {
        return $this->belongsTo('App\SupplierModel','Supplier_ID', 'Supplier_ID');
    }

    public function order_detail()
    {
        return $this->belongsTo('App\PurchaseDetailModel');
    }
}
