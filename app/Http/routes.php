<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/test', 'TestController@index');
//Route::get('/', function(){return view('welcome');});
Route::get('/', 'IndexController@index');
Route::get('/channel1', 'IndexController@channel1');
Route::get('/channel2', 'IndexController@channel2');
Route::get('/channel3', 'IndexController@channel3');
Route::get('/details/{id}', 'IndexController@details');
Route::get('/admin/product/new', 'ProductController@newProduct');
Route::get('/admin/manage', 'ProductController@index');
Route::get('/admin/product/destroy/{id}', 'ProductController@destroy');
Route::get('/admin/product/edit/{id}', 'ProductController@edit');
Route::post('/admin/product/save', 'ProductController@add');
Route::post('/admin/product/update/{id}', 'ProductController@update');

// 认证路由...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@logout');

// 注册路由...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
