<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',function(){
	return view('home');
});
Route::get('/customers',function(){
	return view('customers');
});
Route::get('/billings',function(){
	return view('Billing.index');
});
// Route::get('/billing','BillingController@index');

Route::get('/login',function(){
	return view('login');
});
Route::get('/store',function(){
	return view('store');
});
Route::get('/items',function(){
	return view('items');
});

Route::get('/selectInventory',function(){
	return view('inventory/index_inventory');
});
Route::get('/inventory',function(){
	return view('inventory/inventory');
});
Route::get('/archiveInventory',function(){
	return view('inventory/archive_inventory');
});

Route::get('/category&brands',function(){
	return view('inventory/category_brands');
});
Route::get('/archiveCategory&Brands',function(){
	return view('inventory/archive_category&brands');
});

Route::resource('Billing', 'BillingController');
Route::resource('Inventory', 'InventoryController');

Route::post('/createItem','InventoryController@createItem');
Route::post('/updateItem','InventoryController@updateItem');

