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
Route::get('/', function () {
	return view('welcome');
});

Route::get('form','TestController@form');
Route::post('form/testValidate','TestController@testValidate');
Route::auth();

//front
Route::group(['middleware' => [], 'prefix' => 'front', 'namespace' => 'Front'], function () {
	//定义了注册登录路由
	Route::get('home', 'HomeController@index');
	Route::get('post/{id}', 'PostController@index');
});


//admin
Route::get('admin/login', 'Admin\AuthController@showLoginForm');
Route::post('admin/login', 'Admin\AuthController@login');
Route::get('admin/register', 'Admin\AuthController@getRegister');
Route::post('admin/register', 'Admin\AuthController@postRegister');

Route::group(['middleware' => ['admin.auth:admin'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {//'web', 
	//admin.auth:admin
	Route::get('', 'AdminController@index');
	Route::get('logout', 'AuthController@logout');
	Route::get('index', 'AdminController@index');

	Route::resource('category', 'CategoryController');
	Route::post('article/uploadImg/{guid?}', 'ArticleController@uploadImg');
	Route::resource('article', 'ArticleController');

	Route::resource('tag', 'TagController');
});