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

// index page
Route::get('/','MainController@index');
Route::get('/categories/{id}', 'MainController@categories');

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::group(['prefix'=> 'admin','middleware' => 'auth'] , function () {
    
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
    
});