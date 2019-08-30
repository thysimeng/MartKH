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

Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home')->middleware('checkUserRole');

// Route::get('admin/user', 'UserController@user');
// Admin-related routes
Route::group(['middleware' => ['web','auth','checkUserRole']], function () {


	Route::resource('admin/user', 'Admin\UserController', ['except' => ['show']]);
	Route::get('admin/profile', ['as' => 'admin.profile.edit', 'uses' => 'Admin\ProfileController@edit']);
	Route::put('admin/profile', ['as' => 'admin.profile.update', 'uses' => 'Admin\ProfileController@update']);
	Route::put('admin/profile/password', ['as' => 'admin.profile.password', 'uses' => 'Admin\ProfileController@password']);
	Route::post('admin/profile/upload', ['as' => 'admin.profile.upload', 'uses' => 'Admin\ProfileController@upload']);
	Route::resource('admin/products', 'Admin\ProductController');
	Route::get('admin/products/search',['as' => 'prouducts.search', 'uses' => 'Admin\ProductController@search']);
    // Start ads controller
    Route::resource('admin/ads', 'Admin\AdsController');
    // End ads controller
	Route::post('/delete/{pid}', 'Admin\ProductController@destroy')->name('products.destroy');
	Route::resource('admin/franchises','Admin\FranchiseController',['except' => ['show']]);
	Route::get('admin/franchises',['as' => 'franchises.index', 'uses' => 'Admin\FranchiseController@index']);
	Route::get('admin/franchises/create',['as' => 'franchises.create', 'uses' => 'Admin\FranchiseController@create']);
	Route::post('admin/franchises/store',['as' => 'franchises.store', 'uses' => 'Admin\FranchiseController@store']);
	Route::post('admin/franchises/{id}',['as' => 'franchises.destroy', 'uses' => 'Admin\FranchiseController@destroy']);
	Route::get('admin/franchises/edit/{id}',['as' => 'franchises.edit', 'uses' => 'Admin\FranchiseController@edit']);
	Route::post('admin/franchises/edit/{id}',['as' => 'franchises.update', 'uses' => 'Admin\FranchiseController@update']);
	Route::post('admin/franchises',['as' => 'franchises.linkAccount', 'uses' => 'Admin\FranchiseController@linkAccount']);
	Route::post('admin/franchises/unlinkAccount',['as' => 'franchises.unlinkAccount', 'uses' => 'Admin\FranchiseController@unlinkAccount']);
	Route::get('admin/franchises/linkAccount',['as' => 'franchises.getLinkAccount', 'uses' => 'Admin\FranchiseController@getLinkAccount']);

	// search franchises
	Route::get('admin/franchises/search', ['as' => 'franchises.search', 'uses' => 'Admin\FranchiseController@search']);
	// search users
	Route::get('admin/user/search', ['as' => 'user.search', 'uses' => 'Admin\UserController@search']);
	Route::get('/category', 'Admin\CategoryController@index')->name('admin.category');
	Route::get('/search', 'Admin\CategoryController@search')->name('admin.search');
	Route::post('/create_category', 'Admin\CategoryController@create')->name('admin.create_category');
	Route::get('/delete/{id}', 'Admin\CategoryController@destroy')->name('admin.delete_category');
	Route::post('/edit', 'Admin\CategoryController@edit')->name('admin.edit_category');
	Route::get('/category/sub-category', 'Admin\SubCategoryController@index')->name('admin.category.sub-category');
	Route::post('/admin/create_sub_category', 'Admin\SubCategoryController@create')->name('admin.category.create_sub_category');
	Route::get('/admin/create_sub_category/search', 'Admin\SubCategoryController@search')->name('admin.category.create_sub_category.search');
	Route::post('/admin/sub_category/delete', 'Admin\SubCategoryController@destroy')->name('admin.category.delete_sub_category');
	Route::post('/admin/sub_category/edit', 'Admin\SubCategoryController@edit')->name('admin.category.edit_sub_category');

	Route::get('admin/stock', 'Admin\StockController@index')->name('admin.stock');
	Route::get('admin/stock/search', 'Admin\StockController@stockSearch')->name('admin.stock.search');
	Route::post('admin/create_stock', 'Admin\StockController@create')->name('admin.create_stock');
	Route::post('admin/update_stock', 'Admin\StockController@edit')->name('admin.update_stock');
	Route::get('admin/search_stock', 'Admin\StockController@stockSearch')->name('admin.search_stock');
	Route::post('admin/delete_stock', 'Admin\StockController@delete')->name('admin.delete_stock');

	Route::get('admin/stock/autocomplete',array('as'=>'admin.stock.autocomplete','uses'=>'Admin\StockController@autocomplete'));
	Route::get('admin/stock/autocompleteFranchise',array('as'=>'admin.stock.autocompleteFranchise','uses'=>'Admin\StockController@autocompleteFranchise'));
	
});

// franchise-related routes
Route::group(['middleware' => ['web','auth','checkUserRoleFranchise']], function () {
	Route::get('/franchise','Franchise\FranchiseController@showDashboard')->name('franchise');
	Route::get('/franchise/products','Franchise\FranchiseController@viewProduct')->name('franchise.products');
	Route::get('/franchise/stocks','Franchise\FranchiseController@index')->name('franchise.stock');
	Route::get('/franchise/stocks/request','Franchise\FranchiseController@requestForm')->name('franchise.request');
});

// test route for redirecting users when they try to access admin pages
Route::get('/user', function(){
	return redirect('/users');
})->name('normalUser');

Route::get('/users', 'UsersController\UserHomeController@index')->name('home');
Route::get('/users/shop', 'UsersController\ProductDisplayController@index')->name('productDisplay');
Route::get('/users/food', 'UsersController\ProductsController@food')->name('productFood');
Route::get('/users/all', 'UsersController\ProductsController@get')->name('productFood');
Route::post('/searchweithwh', 'UsersController\ProductsController@search')->name('search');

Route::get('/users/wishlist', 'UsersController\UserHomeController@wishListIndex')->name('list-wishlist');

Route::post('/users/wishlist', 'UsersController\UserHomeController@wishList')->name('add-wishlist');

Route::get('/{any}', function(){
    return view('user');
})->where('any', '^(?!api).*$');
Route::get('/usersTest', 'UsersController\temp\testController@index')->name('get');
