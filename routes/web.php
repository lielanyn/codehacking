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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function() {
	return view('admin.index');
});
//ADMIN-USER
Route::resource('admin/users', 'AdminUsersController');

Route::get('view', ['as'=> 'view', 'uses'=>'AdminUsersController@index']);
Route::get('create', ['as'=> 'create', 'uses'=>'AdminUsersController@create']);

Route::get('/users/edit/{id}', 'AdminUsersController@edit');

Route::group(['middleware'=>'admin'], function() {

	Route::resource('admin/users', 'AdminUsersController');
	Route::resource('admin/posts', 'AdminPostsController');
});
//POST

Route::resource('admin/posts', 'AdminPostsController');
Route::get('postview', ['as'=> 'postview', 'uses'=>'AdminPostsController@index']);
Route::get('postcreate', ['as'=> 'postcreate', 'uses'=>'AdminPostsController@create']);

Route::get('/posts/edit/{id}', 'AdminPostsController@edit');