<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingPost extends Model
{
    //Table Name
    protected $table = 'billing';
    //Primary Key
    public $primaryKey = 'Bill_ID';
}
