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
Route::get('admin/register', 'Admin\AuthController@getRegister');
	Route::post('admin/register', 'Admin\AuthController@postRegister');
Route::group(['middleware' => ['web', 'admin.auth:admin'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
	//admin.auth:admin
	Route::get('', 'AdminController@index');
	Route::get('logout', 'AuthController@logout');
	Route::get('index', 'AdminController@index');

	Route::resource('category', 'CategoryController');

	/*Route::get('article/index', 'ArticleController@index');
	Route::get('article/add', 'ArticleController@add');
	Route::post('article/add', 'ArticleController@doAdd');
	Route::get('article/edit', 'ArticleController@edit');*/
	Route::resource('article', 'ArticleController');
});