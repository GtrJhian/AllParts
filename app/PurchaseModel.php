<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseModel extends Model
{
    use SoftDeletes;
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
