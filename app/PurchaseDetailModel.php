<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseDetailModel extends Model
{
	use SoftDeletes;
    //Table Name
	protected $table = 'order_detail';
    //Primary Key
	public $primaryKey = 'Order_No';

	public function purchase()
	{
		return $this->hasMany('App\PurchaseModel');
	}
}
