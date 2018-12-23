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
Route::get('/login',function(){
	return view('login');
});
Route::get('/store',function(){
	return view('store');
});
Route::get('/items',function(){
	return view('items');
});