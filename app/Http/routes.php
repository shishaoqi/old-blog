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

Route::any('role','TestController@createRole');
Route::any('permission','TestController@createPermission');
Route::any('check','TestController@check');
Route::any('assign','TestController@assign');
Route::any('addPermissions','TestController@addPermissions');
Route::any('form','TestController@form');
Route::get('selectRole','TestController@selectRole');
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
Route::get('admin/logout', 'Admin\AuthController@logout');
Route::get('admin/register', 'Admin\AuthController@getRegister');
Route::post('admin/register', 'Admin\AuthController@postRegister');

Route::group(['middleware' => ['admin.auth:admin', 'menu'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {//'web', 
	//admin.auth:admin
	Route::get('', 'AdminController@index');
	Route::get('index', 'AdminController@index');
	Route::get('check', 'AdminController@check');

	//分类路由
	Route::resource('category', 'CategoryController');

	//文章路由
	Route::post('article/uploadImg/{guid?}', 'ArticleController@uploadImg');
	Route::resource('article', 'ArticleController');

	//标签路由
	Route::resource('tag', 'TagController');

	//用户管理路由
    Route::get('user/manage', ['as' => 'admin.user.manage', 'uses' => 'UserController@index']);  //用户管理
    Route::post('user/index', ['as' => 'admin.user.index', 'uses' => 'UserController@index']);
    Route::resource('user', 'UserController');
    Route::put('user/update', ['as' => 'admin.user.edit', 'uses' => 'UserController@update']); //修改
    Route::post('user/store', ['as' => 'admin.user.create', 'uses' => 'UserController@store']); //添加

    //权限管理路由
    Route::get('permission/{cid}/create', ['as' => 'admin.permission.create', 'uses' => 'PermissionController@create']);
    Route::post('permission/{cid}/create', ['as' => 'admin.permission.create', 'uses' => 'PermissionController@create']);
    Route::get('permission/{cid?}', ['as' => 'admin.permission.index', 'uses' => 'PermissionController@index']);
    Route::post('permission/index', ['as' => 'admin.permission.index', 'uses' => 'PermissionController@index']); //查询
    Route::resource('permission', 'PermissionController');
    Route::put('permission/update', ['as' => 'admin.permission.edit', 'uses' => 'PermissionController@update']); //修改
    Route::post('permission/store', ['as' => 'admin.permission.create', 'uses' => 'PermissionController@store']); //添加

    //角色管理路由
    Route::get('role/index', ['as' => 'admin.role.index', 'uses' => 'RoleController@index']);
    Route::post('role/index', ['as' => 'admin.role.index', 'uses' => 'RoleController@index']);
    Route::resource('role', 'RoleController');
    Route::put('role/update', ['as' => 'admin.role.edit', 'uses' => 'RoleController@update']); //修改
    Route::post('role/store', ['as' => 'admin.role.create', 'uses' => 'RoleController@store']); //添加

});