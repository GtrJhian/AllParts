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


Route::resource('Billing', 'BillingController');

//================AJAX ROUTES====================//

Route::get('/Store/json/{param}','Store@json');
Route::get('/Store/json/item/{id}','Store@jsonItem');
Route::get('/selectInventory',function(){
	return view('inventory.index_inventory');
});
Route::get('/inventory',function(){
	return view('inventory.inventory');
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

Route::resource('Billing', 'BillingController');
Route::resource('Inventory', 'InventoryController');

Route::get('/Store/json/{param}','Store@json');
Route::get('/Store/json/item/{id}','Store@jsonItem');

Route::post('/createItem','InventoryController@createItem');
Route::post('/createBrand','InventoryController@createBrand');
Route::post('/createCategory','InventoryController@createCategory');
Route::post('/updateItem','InventoryController@updateItem');
Route::post('/updateBrand','InventoryController@updateBrand');
Route::post('/updateCategory','InventoryController@updateCategory');
Route::post('/archiveItem','InventoryController@archiveItem')->name("archiveItem");
Route::post('/archiveBrand','InventoryController@archiveBrand')->name("archiveBrand");
Route::post('/archiveCategory','InventoryController@archiveCategory')->name("archiveCategory");
Route::post('/unarchiveItem','InventoryController@unarchiveItem')->name("unarchiveItem");
Route::post('/unarchiveBrand','InventoryController@unarchiveBrand')->name("unarchiveBrand");
Route::post('/unarchiveCategory','InventoryController@unarchiveCategory')->name("unarchiveCategory");
Route::post('/popItemForm','InventoryController@popItemForm')->name("popItemForm");
Route::post('/popBrandForm','InventoryController@popBrandForm')->name("popBrandForm");
Route::post('/popCategoryForm','InventoryController@popCategoryForm')->name("popCategoryForm");
?>
