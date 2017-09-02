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

Route::get('/', 'ProductController@getIndex');

Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart');

Route::get('/reduce/{id}', 'ProductController@getReduceByOne');

Route::get('/remove/{id}', 'ProductController@getRemoveItem');

Route::get('/shopping-cart', 'ProductController@getCart');

Route::get('/admin', 'SessionsController@create');
Route::post('/admin', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');


Route::get('/cms', 'CmsController@cms');
Route::get('/cms/remove/{id}', 'CmsController@RemoveItem');
Route::post('/cms/update/{id}', 'CmsController@UpdateItem');
Route::post('/cms/add', 'CmsController@AddItem');

Route::get('/search', 'ProductController@search');

