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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/products/create', 'ProductController@create')->name('products.create')->middleware('auth');
Route::post('/products', 'ProductController@store')->name('products.store')->middleware('auth');

// Route::get('/products/edit', 'ProductController@edit');
Route::get('/products/{id}', 'ProductController@show')->name('products.show');//{id}- cia tik vardas, sitoj vietoj uzsivardinam ir kontroleri galim naudot
//@show rasom, nes cia Action is lavraver lenteles dokumentacijoj
//routai su kintaaisiais apacioj turi but
Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit')->middleware('auth');
Route::put('/products/{id}', 'ProductController@update')->name('products.update')->middleware('auth');
Route::delete('/products/{id}', 'ProductController@destroy')->name('products.destroy')->middleware('auth');

//sukuria 7 routus, kurios galime panaudoti kuriant CRUD'a
Route::resource('categories', 'CategoryController');
Route::resource('manufacturers', 'ManufacturerController');
