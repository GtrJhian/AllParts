<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupplierModel extends Model
{
    
    use SoftDeletes;

    // protected $dates = ['deleted_at' ];
    //Table Name
    protected $table = 'supplier';
    //Primary Key
    public $primaryKey = 'Supplier_ID';

    
}
