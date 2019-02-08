<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryPost extends Model
{
    //Table Name
    protected $table = 'inventory';
    //Primary Key
    public $primaryKey = 'Item_ID';
}
