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

//Route::match(['get', 'post'], '/', '');
//
Route::group(['middleware' => ['web']], function () {

	Route::get('/', function () {
		return view('welcome');
	});

	Route::auth(); //定义了注册登录路由
	Route::get('/home', 'HomeController@index');
});


Route::get('admin/login', 'Admin\AuthController@showLoginForm');
Route::post('admin/login', 'Admin\AuthController@login');
Route::group(['middleware' => ['web', 'admin.auth:admin'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
	//admin.auth:admin
	Route::get('', 'AdminController@index');
	Route::get('logout', 'AuthController@logout');
	Route::get('register', 'AuthController@getRegister');
	Route::post('register', 'AuthController@postRegister');
	Route::get('index', 'AdminController@index');

	//Route::get('category/create{pid?}', 'CategoryController@create');
	Route::resource('category', 'CategoryController');
});