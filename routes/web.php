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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => 'auth'] , function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/categories','CategoryController@index');
    Route::get('/categories/create','CategoryController@create');
    Route::post('/categories/store','CategoryController@store');
    Route::get('/categories/edit/{id}','CategoryController@edit');
    Route::delete('/categories/destroy/{id}','CategoryController@destroy');
    Route::post('/categories/update/{id}','CategoryController@update');
});