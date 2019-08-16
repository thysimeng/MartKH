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

Route::get('/home', 'Admin\HomeController@index')->name('home')->middleware('checkUserRole');

// Route::get('admin/user', 'UserController@user');

Route::group(['middleware' => ['web','auth','checkUserRole']], function () {
	
	Route::resource('admin/user', 'Admin\UserController', ['except' => ['show']]);
	Route::get('admin/profile', ['as' => 'admin.profile.edit', 'uses' => 'Admin\ProfileController@edit']);
	Route::put('admin/profile', ['as' => 'admin.profile.update', 'uses' => 'Admin\ProfileController@update']);
	Route::put('admin/profile/password', ['as' => 'admin.profile.password', 'uses' => 'Admin\ProfileController@password']);
	Route::resource('admin/products', 'Admin\ProductController', ['except' => ['show']]);
	Route::resource('admin/franchises','Admin\FranchiseController',['except' => ['show']]);
	Route::get('admin/franchises',['as' => 'franchises.index', 'uses' => 'Admin\FranchiseController@index']);
	Route::get('admin/franchises/create',['as' => 'franchises.create', 'uses' => 'Admin\FranchiseController@create']);
	Route::post('admin/franchises',['as' => 'franchises.store', 'uses' => 'Admin\FranchiseController@store']);
	Route::post('admin/franchises/{id}',['as' => 'franchises.destroy', 'uses' => 'Admin\FranchiseController@destroy']);
	Route::get('admin/franchises/edit/{id}',['as' => 'franchises.edit', 'uses' => 'Admin\FranchiseController@edit']);
	Route::post('admin/franchises/edit/{id}',['as' => 'franchises.update', 'uses' => 'Admin\FranchiseController@update']);

	// search franchises
	Route::get('admin/franchises/search', ['as' => 'franchises.search', 'uses' => 'Admin\FranchiseController@search']);
	// search users
	Route::get('admin/user/search', ['as' => 'user.search', 'uses' => 'Admin\UserController@search']);
});

Route::get('/user', function(){
	return view('user');
})->name('normalUser');