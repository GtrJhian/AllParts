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
	return view('sales_templates.customers');
});
Route::get('/login',function(){
	return view('login');
});
Route::get('/store',function(){
	return view('sales_templates.store');
});
Route::get('/items',function(){
	return view('sales_templates.items');
});
//=====//
Route::get('/users',function(){
	return view ('users.user_lists');
});
Route::get('/archive_users',function(){
	return view ('users.archive_user');
});
Route::get('/logs',function(){
	return view ('users.activity_logs');
});
//================AJAX ROUTES====================//

Route::get('/Store/json/{param}','StoreController@json');
Route::get('/Store/json/item/{id}','StoreController@jsonItem');
//--Zild Was Here
//=================











//===============================//

//===============Customer Routes==================//
Route::post('/Customer/Create','CustomerController@Create');
Route::get('/Customer/All','CustomerController@ShowAll');
Route::get('/Customer/id/{id}','CustomerController@Select');
//Route::resource('/Customer', 'Customer');
//---Zild was here
//================================================//

//================================================//
//Billing Routes
// Route::resource('Billing', 'BillingController');
Route::get('/Billing','BillingController@index');
Route::get('/Billing/viewBill/{id}','BillingController@viewBill');
Route::get('/Billing/{id}/edit','BillingController@editBill');
Route::post('/Billing/addPayment','BillingController@addPayment');
Route::get('/Billing/archive/{id}','BillingController@archiveBill');
Route::get('/Billing/Receipt/{id}','BillingController@receipt');
Route::get('/Billing/Excel/','BillingController@excel');
//End of Billing Routes
//--Fred 
//================================================//
Route::get('/selectInventory',function(){
	$inventories = \DB::table('inventory')->where('archive',0)->where('Item_Type',0)->orderBy('item_code','ASC')->get();
	return view('inventory.index_inventory')->with('inventories',$inventories);
});
Route::get('/inventoryMain',function(){
	$inventories = \DB::table('inventory')->where('archive',0)->orderBy('item_code','ASC')->get();
	return view('inventory.inventory')->with('inventories',$inventories);
});

Route::get('/archiveInventory',function(){
	return view('inventory.archive_inventory');
});

Route::get('/category&brands',function(){
	return view('inventory.category_brands');
});
Route::get('/archiveCategory&Brands',function(){
	return view('inventory.archive_category&brands');
});

Route::get('/inventoryReports',function(){
	return view('inventory.inventoryReports');
});



Route::resource('Inventory', 'InventoryController');
Route::post('/createItem','InventoryController@createItem');
Route::post('/createPackage','InventoryController@createPackage');
Route::post('/createBrand','InventoryController@createBrand');
Route::post('/createCategory','InventoryController@createCategory');
Route::post('/updateItem','InventoryController@updateItem');
Route::post('/updatePckgInfo','InventoryController@updatePckgInfo');
Route::post('/updatePckgList','InventoryController@updatePckgList');
Route::post('/updateBrand','InventoryController@updateBrand');
Route::post('/updateCategory','InventoryController@updateCategory');
Route::post('/archiveItem','InventoryController@archiveItem')->name("archiveItem");
Route::post('/deleteItem','InventoryController@deleteItem')->name("deleteItem");
Route::post('/archiveBrand','InventoryController@archiveBrand')->name("archiveBrand");
Route::post('/archiveCategory','InventoryController@archiveCategory')->name("archiveCategory");
Route::post('/unarchiveItem','InventoryController@unarchiveItem')->name("unarchiveItem");
Route::post('/unarchiveBrand','InventoryController@unarchiveBrand')->name("unarchiveBrand");
Route::post('/unarchiveCategory','InventoryController@unarchiveCategory')->name("unarchiveCategory");
Route::post('/deleteBrand','InventoryController@deleteBrand')->name("deleteBrand");
Route::post('/deleteCategory','InventoryController@deleteCategory')->name("deleteCategory");
Route::post('/popItemForm','InventoryController@popItemForm')->name("popItemForm");
Route::post('/popPckgList','InventoryController@popPckgList')->name("popPckgList");
Route::post('/popBrandForm','InventoryController@popBrandForm')->name("popBrandForm");
Route::post('/popCategoryForm','InventoryController@popCategoryForm')->name("popCategoryForm");
Route::post('/getInvAlerts','InventoryController@getInvAlerts')->name("getInvAlerts");
Route::post('/getPic','InventoryController@getPic')->name("getPic");
//--Keith
?>
