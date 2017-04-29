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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();


Route::get('/','MainController@index');
Route::get('/categories/{id}', 'MainController@categories');
Route::get('/products/{id}', 'MainController@products');
Route::get('/orders', 'MainController@orders');

Route::get('/home', 'HomeController@index');

Route::post('/orders/store', 'OrderController@store');

Route::group(['prefix'=> 'admin','middleware' => ['auth','admin']] , function () {
    
    // Categories
    Route::get('/categories','CategoryController@index');
    Route::get('/categories/create','CategoryController@create');
    Route::post('/categories/store','CategoryController@store');
    Route::get('/categories/edit/{id}','CategoryController@edit');
    Route::delete('/categories/destroy/{id}','CategoryController@destroy');
    Route::post('/categories/update/{id}','CategoryController@update');

    // Products
    Route::get('/products','ProductController@index');
    Route::get('/products/create','ProductController@create');
    Route::post('/products/store','ProductController@store');
    Route::get('/products/edit/{id}','ProductController@edit');
    Route::delete('/products/destroy/{id}','ProductController@destroy');
    Route::post('/products/update/{id}','ProductController@update');
    //Orders
    Route::get('/orders','OrderController@index');
    Route::get('/orders/edit/{id}','OrderController@edit');
    Route::post('/orders/update/{id}','OrderController@update');
    Route::delete('/orders/destroy/{id}','OrderController@destroy');
    // users
    Route::get('/users','UserController@index');
    Route::get('/users/edit/{id}','UserController@edit');
    Route::post('/users/update/{id}','UserController@update');
    Route::delete('/users/destroy/{id}','UserController@destroy');
});