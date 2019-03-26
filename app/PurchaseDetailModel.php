<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetailModel extends Model
{
    //Table Name
    protected $table = 'order_detail';
    //Primary Key
    public $primaryKey = 'Order_No';
}
