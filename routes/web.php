<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/', ['uses' => 'IndexController@index', 'as' => '/']);
Route::get('/produce', ['uses' => 'ProduceController@index', 'as' => '/produce']);
Route::get('/produce/{id}', ['uses' => 'ProduceController@show', 'as' => '/produce/{id}']);
Route::get('/store', ['uses' => 'StoreController@index', 'as' => '/store']);
Route::get('/store/{location}', ['uses' => 'StoreController@show', 'as' => '/store/{location}']);
Route::get('/about', ['uses' => 'AboutController@index', 'as' => '/about']);
Route::get('/contact', ['uses' => 'ContactController@index', 'as' => '/contact']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
