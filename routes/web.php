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
//home
Route::get('/','HomeController@index');


Route::get('/dashboard','DashboardController@index');

//item type
Route::get('/maintenance/item-type','ItemTypeController@index');
Route::get('/ajax/get-item-type','ItemTypeController@getType');

Route::post('/item-type/insert','ItemTypeController@save');
Route::post('/item-type/update','ItemTypeController@update');
Route::post('/item-type/delete','ItemTypeController@delete');

//item category
Route::get('/maintenance/item-category','ItemCategoryController@index');
Route::get('/ajax/get-item-category','ItemCategoryController@getType');

Route::post('/item-category/insert','ItemCategoryController@save');
Route::post('/item-category/update','ItemCategoryController@update');
Route::post('/item-category/delete','ItemCategoryController@delete');

//item
Route::get('/maintenance/item','ItemController@index');
Route::get('/ajax/get-item-gettype','ItemController@getType');
Route::get('/ajax/get-item','ItemController@getItem');

Route::post('/item/insert','ItemController@save');
Route::post('/item/update','ItemController@update');
Route::post('/item/delete','ItemController@delete');
Route::post('/item/addstock','ItemController@addStock');
