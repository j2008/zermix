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
Route::get('/product', ['uses' => 'ProductController@index', 'as' => '/']);
Route::get('/product/{id}', ['uses' => 'ProductController@show', 'as' => '/product/{id}']);
Route::get('/store', ['uses' => 'StoreController@index', 'as' => '/store']);
Route::get('/store/{location}', ['uses' => 'StoreController@show', 'as' => '/store/{location}']);
Route::get('/about', ['uses' => 'AboutController@index', 'as' => '/about']);
Route::get('/contact', ['uses' => 'ContactController@index', 'as' => '/contact']);
Route::get('/feature', ['uses' => 'ContentController@feature', 'as' => '/feature']);
Route::get('/pr', ['uses' => 'ContentController@pr', 'as' => '/pr']);
Route::get('/review', ['uses' => 'ContentController@review', 'as' => '/review']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
