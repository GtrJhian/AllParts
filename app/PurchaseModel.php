<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseModel extends Model
{
    //Table Name
    protected $table = 'purchase_order';
    //Primary Key
    public $primaryKey = 'Order_No';
}
