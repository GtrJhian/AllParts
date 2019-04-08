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
})->middleware('auth');
Route::get('/customers',function(){
	return view('sales_templates.customers');
})->middleware('auth');
Route::get('/login',function(){
	return view('login');
})->name('login');
Route::get('/store',function(){
	return view('sales_templates.store');
})->middleware('auth','authSales');
Route::get('/items',function(){
	return view('sales_templates.items');
})->middleware('auth','authSales');

Route::get('/arch_customer',function(){
	return view('sales_templates.arch_customer');
})->middleware('auth','authSales');
//=====//
Route::get('/users',function(){
	return view ('users.user_lists');
})->middleware('auth','authAdmin');
Route::get('/archive_users',function(){
	return view ('users.archive_user');
})->middleware('auth','authAdmin');
Route::get('/logs',function(){
	return view ('users.activity_logs');
})->middleware('auth','authAdmin');
Route::get('/profile',function(){
	return view ('profile');
})->middleware('auth');
//================AJAX ROUTES====================//

Route::get('/Store/json/{param}','StoreController@json');
Route::get('/Store/json/item/{id}','StoreController@jsonItem');
//--Zild Was Here
//=================


//================Supplier Routes====================//
Route::get('/supplier',[
	'uses' => 'SupplierController@index',
	'as' => 'supplier'
]);


Route::get('/supply/reports',function(){
	return view('Supply.reports');
})->middleware('auth','authSuppliers');
Route::post('/add/supplier', [
	'uses' => 'SupplierController@store'
]);
Route::get('/trash/supplier/{id}', [
	'uses' => 'SupplierController@destroy',
	'as' => 'supplier.archive'
]);

Route::get('/supplier/archive', [
	'uses' => 'SupplierController@trashed',
	'as' => 'supplier.trashed'
]);

//===================Store====================//

Route::post('/Store/submit','StoreController@Submit');
Route::post('/Store/validate','StoreController@ValidateForm');

//============================================//



Route::get('/supplier/delete/{id}', [
	'uses' => 'SupplierController@kill',
	'as' => 'supplier.kill'
]);
Route::get('/supplier/restore/{id}', [
	'uses' => 'SupplierController@restore',
	'as' => 'supplier.restore'
]);
Route::get('/supplier/edit/{id}',[
	'uses'=>'SupplierController@edit',
	'as'=>'supplier.edit'
]);
Route::post('/supplier/update/{id}',[
	'uses'=>'SupplierController@update',
	'as'=>'supplier.update'
]);
//===============================//
//================Purchasing Routes====================//
Route::post('/purchasing/store',[	
	'uses' => 'PurchasingController@store'
]);

Route::get('/purchasing',[	
	'uses' => 'PurchasingController@index',
	'as' => 'purchasing.index'
]);

Route::get('/purchasing/edit',[	
	'uses' => 'PurchasingController@edit',
	'as' => 'purchasing.edit'
]);

Route::post('/purchasing/delete', [
	'uses' => 'PurchasingController@destroy',
	'as' => 'purchasing.delete'
]);

Route::get('/purchasing/archive', [
	'uses' => 'PurchasingController@trashed',
	'as' => 'purchasing.trashed'
]);

Route::post('/purchasing/archive/delete', [
	'uses' => 'PurchasingController@kill',
	'as' => 'purchasing.kill'
]);
Route::get('/purchasing/archive/restore/{id}', [
	'uses' => 'PurchasingController@restore',
	'as' => 'purchasing.restore'
]);
Route::get('/purchasing/approve/{id}', [
	'uses' => 'PurchasingController@approve',
	'as' => 'purchasing.approve'
]);
Route::get('/purchasing/deliver/{id}', [
	'uses' => 'PurchasingController@deliver',
	'as' => 'purchasing.deliver'
]);
Route::post('/purchasing/deliver/delete', [
	'uses' => 'PurchasingController@deliver_destroy',
	'as' => 'purchasing.delete_deliver'
]);
//===============================//
//===============Customer Routes==================//
Route::post('/Customer/Create','CustomerController@Create');
Route::get('/Customer/All','CustomerController@ShowAll');
Route::get('/Customer/id/{id}','CustomerController@Select');
Route::get('/Customer/archived','CustomerController@Archived');
Route::post('/Customer/update','CustomerController@Update');
Route::post('/Customer/delete','CustomerController@Delete');
Route::post('/Customer/restore','CustomerController@Restore');

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
Route::get('/Billing/Excel/{month}/{archived}/{reportType}','BillingController@excel');
Route::get('/Billing/viewArchived/','BillingController@viewArchived');
Route::get('/Billing/unarchive/{id}','BillingController@unarchiveBill');
Route::get('/Billing/Accounting','BillingController@viewAccounting');
//End of Billing Routes
//--Fred 
//================================================//

//================================================//
//Inventory Routes
// Route::resource('Inventory', 'InventoryController');

Route::get('/selectInventory',function(){
	$inventories = \DB::table('inventory')->where('archive',0)->where('Item_Type',0)->orderBy('item_code','ASC')->get();
	return view('inventory.index_inventory')->with('inventories',$inventories);
})->middleware('auth','authInventory');
Route::get('/inventoryMain',function(){
	$inventories = \DB::table('inventory')->where('archive',0)->orderBy('item_code','ASC')->get();
	return view('inventory.inventory')->with('inventories',$inventories);
})->middleware('auth','authInventory');

Route::get('/archiveInventory',function(){
	return view('inventory.archive_inventory');
})->middleware('auth','authInventory');

Route::get('/category&brands',function(){
	return view('inventory.category_brands');
})->middleware('auth','authInventory');
Route::get('/archiveCategory&Brands',function(){
	return view('inventory.archive_category&brands');
})->middleware('auth','authInventory');

Route::get('/inventoryReports',function(){
	return view('inventory.inventoryReports');
})->middleware('auth','authInventory');



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
Route::post('/getInvItems','InventoryController@getInvItems')->name("getInvItems");
Route::post('/getPic','InventoryController@getPic')->name("getPic");
Route::post('/viewItem','InventoryController@viewItem')->name("viewItem");
Route::post('/checkCode','InventoryController@checkCode')->name("checkCode");
Route::post('/checkCateg','InventoryController@checkCateg')->name("checkCateg");
Route::post('/checkBrand','InventoryController@checkBrand')->name("checkBrand");
//End of Inventory Routes
//--KasperBK
//================================================//

//===============USERS============================//

Route::post('/User/register','UserController@Register');
Route::post('/User/login','UserController@Login');
Route::get('/User/logout','UserController@Logout');
Route::get('/User/show','UserController@ShowAll');
Route::get('/User/current','UserController@Current');
Route::post('/User/delete','UserController@Delete');
Route::post('/User/edit','UserController@Edit');
Route::post('/User/select','UserController@Select');
Route::post('/User/changepassword','UserController@ChangePassword');

//--Zild
//===============================================//
?>
