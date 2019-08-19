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

Route::get('/home', 'Admin\HomeController@index')->name('home');

// Route::get('admin/user', 'UserController@user');

Route::group(['middleware' => 'auth'], function () {
	
	Route::resource('admin/user', 'Admin\UserController', ['except' => ['show']]);
	Route::get('admin/profile', ['as' => 'admin.profile.edit', 'uses' => 'Admin\ProfileController@edit']);
	Route::put('admin/profile', ['as' => 'admin.profile.update', 'uses' => 'Admin\ProfileController@update']);
	Route::put('admin/profile/password', ['as' => 'admin.profile.password', 'uses' => 'Admin\ProfileController@password']);
	Route::resource('admin/products', 'Admin\ProductController');
	Route::post('/delete/{pid}', 'Admin\ProductController@destroy')->name('products.destroy');
});

Route::get('/category', 'Admin\CategoryController@index')->name('admin.category');
Route::get('/search', 'Admin\CategoryController@search')->name('admin.search');
Route::post('/create_category', 'Admin\CategoryController@create')->name('admin.create_category');
Route::get('/delete/{cid}', 'Admin\CategoryController@destroy')->name('admin.delete_category');
Route::post('/edit', 'Admin\CategoryController@edit')->name('admin.edit_category');

Route::get('/view-sub-category', function (){
	return view('admin.category.sub-category.index');
})->name('admin.sub-category');