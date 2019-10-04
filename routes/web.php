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

Route::get('/', 'UsersController\UserHomeController@index')->name('home');

Auth::routes();

Route::get('/admin', 'Admin\HomeController@index')->name('admin.home')->middleware('checkUserRole');

// Route::get('admin/user', 'UserController@user');
// Admin-related routes
Route::group(['middleware' => ['web','auth','checkUserRole']], function () {

	Route::get('/admin/dashboard', function () {
		return view('admin/dashboard');
	})->name('admin.dashboard');

	Route::get('admin/user/search', ['as' => 'user.search', 'uses' => 'Admin\UserController@search']);
	Route::resource('admin/user', 'Admin\UserController', ['except' => ['show']]);
	Route::get('admin/profile', ['as' => 'admin.profile.edit', 'uses' => 'Admin\ProfileController@edit']);
	Route::put('admin/profile', ['as' => 'admin.profile.update', 'uses' => 'Admin\ProfileController@update']);
	Route::put('admin/profile/password', ['as' => 'admin.profile.password', 'uses' => 'Admin\ProfileController@password']);
	Route::post('admin/profile/upload', ['as' => 'admin.profile.upload', 'uses' => 'Admin\ProfileController@upload']);
	Route::get('admin/products/search',['as' => 'prouducts.search', 'uses' => 'Admin\ProductController@search']);
	// Route::get('images-upload', 'HomeController@imagesUpload');
	Route::resource('admin/products', 'Admin\ProductController');
    // Start ads controller
	Route::resource('admin/ads', 'Admin\AdsController');
	Route::post('admin/ads/adsLeft1', 'Admin\AdsController@adsLeftUpload1')->name('adsLeft1.upload');
	Route::post('admin/ads/adsMiddle1', 'Admin\AdsController@adsMiddleUpload1')->name('adsMiddle1.upload');
	Route::post('admin/ads/adsTopRight1', 'Admin\AdsController@adsTopRightUpload1')->name('adsTopRight1.upload');
	Route::post('admin/ads/adsBottomRight1', 'Admin\AdsController@adsBottomRightUpload1')->name('adsBottomRight1.upload');
	Route::post('admin/ads/adsLeft2', 'Admin\AdsController@adsLeftUpload2')->name('adsLeft2.upload');
	Route::post('admin/ads/adsTopRight2', 'Admin\AdsController@adsTopRightUpload2')->name('adsTopRight2.upload');
	Route::post('admin/ads/adsBottomRight2', 'Admin\AdsController@adsBottomRightUpload2')->name('adsBottomRight2.upload');
	Route::post('admin/ads/adsMiddle3', 'Admin\AdsController@adsMiddleUpload3')->name('adsMiddle3.upload');
	// End ads controller
	Route::post('/delete/{pid}', 'Admin\ProductController@destroy')->name('products.destroy');
	Route::post('admin/franchises/linkAccount',['as' => 'franchises.linkAccount', 'uses' => 'Admin\FranchiseController@linkAccount']);
	Route::get('admin/franchises/unlinkAccount',['as' => 'franchises.unlinkAccount', 'uses' => 'Admin\FranchiseController@unlinkAccount']);
	Route::get('admin/franchises/linkedAccount',['as' => 'franchises.getLinkAccount', 'uses' => 'Admin\FranchiseController@getLinkAccount']);
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
	Route::post('admin/stock/create', 'Admin\StockController@create')->name('admin.create_stock');
	Route::post('admin/stock/update', 'Admin\StockController@edit')->name('admin.update_stock');
	Route::get('admin/stock/search', 'Admin\StockController@stockSearch')->name('admin.search_stock');
	Route::post('admin/stock/delete', 'Admin\StockController@delete')->name('admin.delete_stock');
	Route::get('admin/stock/franchises_stock','Admin\StockController@viewFranchiseStock')->name('admin.viewFranchiseStock');
	Route::get('admin/stock/franchises_stock/search','Admin\StockController@franchiseStockSearch')->name('admin.franchiseStockSearch');

	Route::get('admin/stock/autocomplete',array('as'=>'admin.stock.autocomplete','uses'=>'Admin\StockController@autocomplete'));
	Route::get('admin/stock/autocompleteFranchise',array('as'=>'admin.stock.autocompleteFranchise','uses'=>'Admin\StockController@autocompleteFranchise'));

	Route::get('admin/stock/requestHistory/search', 'Admin\RequestController@requestHistorySearch')->name('admin.requestHistorySearch');
	Route::get('admin/stock/requestHistory', 'Admin\RequestController@requestHistory')->name('admin.requestHistory');
	Route::get('admin/stock/requests/search', 'Admin\RequestController@search')->name('admin.request.search');
	Route::get('admin/stock/requests', 'Admin\RequestController@index')->name('admin.request');
	Route::get('admin/stock/approve/{id}', 'Admin\RequestController@approve')->name('admin.request.approve');
	Route::get('admin/stock/decline/{id}', 'Admin\RequestController@decline')->name('admin.request.decline');

	// old (probably) unused routes
	Route::get('admin/approved_request_stocks', 'Admin\RequestController@ApprovedRequest')->name('admin.stock.approved_request');
	Route::post('admin/edit_notification', 'Admin\RequestController@edit')->name('admin.manage_stock');
	Route::get('admin/request_stock/search', 'Admin\RequestController@search')->name('admin.request_stock.search');
    Route::get('admin/settings', ['as' => 'settings.index', 'uses' => 'Admin\SettingController@index']);
    Route::get('admin/settings/godark', ['as' => 'settings.godark', 'uses' => 'Admin\SettingController@godark']);
    Route::post('admin/settings/basicColor', ['as' => 'settings.basicColor', 'uses' => 'Admin\SettingController@basicColor']);
	Route::post('admin/settings/logo', ['as' => 'settings.logo', 'uses' => 'Admin\SettingController@logo']);
    Route::post('admin/settings/gradientColor', ['as' => 'settings.gradientColor', 'uses' => 'Admin\SettingController@gradientColor']);
});

// franchise-related routes
Route::group(['middleware' => ['web','auth','checkUserRoleFranchise']], function () {
	Route::get('/franchise','Franchise\FranchiseController@showDashboard')->name('franchise');
	Route::get('/franchise/products','Franchise\FranchiseController@viewProduct')->name('franchise.products');
	Route::get('/franchise/stocks/search','Franchise\FranchiseController@search')->name('franchise.stock.search');
	Route::get('/franchise/stocks','Franchise\FranchiseController@index')->name('franchise.stock');
	Route::get('/franchise/stocks/request','Franchise\FranchiseController@requestForm')->name('franchise.request');
	Route::post('/franchise/stocks/store','Franchise\FranchiseController@requestStock')->name('franchise.requestStock');
	Route::get('/franchise/stocks/history/search','Franchise\FranchiseController@searchRequestHistory')->name('franchise.searchRequestHistory');
	Route::get('/franchise/stocks/history','Franchise\FranchiseController@requestHistory')->name('franchise.requestHistory');
	Route::get('/franchise/stock/autocomplete',array('as'=>'franchise.stock.autocomplete','uses'=>'Franchise\FranchiseController@autocomplete'));
	Route::put('franchise/profile/password','Franchise\FranchiseController@password')->name('franchise.profile.password');
	Route::post('franchise/profile/upload','Franchise\FranchiseController@upload')->name('franchise.profile.upload');
	Route::get('/franchise/profile','Franchise\FranchiseController@editProfile')->name('franchise.edit.profile');
	Route::put('/franchise/profile','Franchise\FranchiseController@updateProfile')->name('franchise.update.profile');
});

// test route for redirecting users when they try to access admin pages
Route::get('/user', function(){
	return redirect('/');
})->name('normalUser');

//route for reload vue
Route::get('/users', 'UsersController\UserHomeController@index')->name('home');
Route::get('/products/all', 'UsersController\ProductDisplayController@index')->name('productDisplay');
Route::get('/products/food', 'UsersController\ProductDisplayController@index')->name('productDisplay-food');
Route::get('/products/filterByPrice', 'UsersController\ProductDisplayController@index')->name('productDisplay-food');
Route::get('/wishlists', 'UsersController\ProductDisplayController@index')->name('wishlists');


Route::post('/searchweithwh', 'UsersController\ProductsController@search')->name('search');
Route::get('/users/all', 'UsersController\ProductsController@get')->name('productFood');
Route::get('/users/food', 'UsersController\ProductsController@food')->name('productFood');
Route::get('/categoriesAll', 'UsersController\ProductsController@categories')->name('categories');
Route::get('/categories1', 'UsersController\ProductsController@categories1')->name('categories1');
Route::get('/wishlistproducts', 'UsersController\ProductsController@wishlistproducts')->name('wishlistproducts');
// route for get slide template ID display
Route::get('/adsTemplateID', 'UsersController\ProductsController@adsID')->name('ads.id');
Route::get('/setTemplateID', 'UsersController\ProductsController@setTemplateID')->name('setTemplate.id');
Route::get('/slidedatadisplay', 'UsersController\ProductsController@slidedatadisplay')->name('slide-data-display');

Route::post('/users/profile/update','UsersController\UserHomeController@updateUserProfile')->name('updateUserProfile');
Route::post('/users/profile/upload','UsersController\UserHomeController@upload')->name('uploadProfile');
Route::get('/users/profile','UsersController\UserHomeController@userProfile')->name('userProfile');
Route::get('/users/wishlist', 'UsersController\UserHomeController@wishListIndex')->name('list-wishlist');
Route::get('/wishlistdisplay', 'UsersController\UserHomeController@wishlistdisplay')->name('wishlistdisplay');
Route::post('/users/wishlist', 'UsersController\UserHomeController@wishList')->name('add-wishlist');
// Google Account
// Route::get('google', function () {
//     return view('googleAuth');
// });
Route::get('/auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/auth/{provider}', 'Auth\LoginController@redirectToProvider')->name('redirectToProvider');
// Route::get('/auth/facebook/callback', 'Auth\LoginController@handleFacebookCallback');
// Route::get('/auth/facebook', 'Auth\LoginController@redirectToFacebook')->name('redirectToFacebook');
Route::post('/users/delete-wishlist', 'UsersController\UserHomeController@deleteWishList')->name('delete-wishlist');

// Route::get('/{any}', function(){
//     return view('user');
// })->where('any', '^(?!api).*$');
Route::get('/usersTest', 'UsersController\temp\testController@index')->name('get');
