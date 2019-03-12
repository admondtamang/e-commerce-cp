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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', 'IndexController@index');

Route::get('/product-detail/{id}', 'IndexController@detialproduct');
// Route::post('/addToCart/{id}', 'cartController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});
Route::resource('/registerStore', 'Auth\RegisterStoreController');

Route::group(['prefix' => 'store'], function () {
    Route::get('login', 'Auth\StoreLoginController@showLoginForm')->name('store.login');
    Route::post('login', 'Auth\StoreLoginController@login')->name('store.login.submit');
    Route::get('/', 'StoreController@index')->name('store.dashboard');
    Route::resource('/products', 'ProductController');
});

Route::get('/list-products', 'IndexController@shop');

//wishlist
Route::get('/wishlist', 'WhishlistController@index');

Route::get('/allProducts', 'ProductController@allProducts');
//profile
Route::resource('/profile', 'ProfileController');
// Route::get('/profile', 'ProfileController@viewProfile')->name('profile');
// // Route::get('/editProfile/{id}', 'ProfileController@editProfile')->name('edit.profile');
// // Route::put('/updateProfile/{id}', 'ProfileController@updateProfile')->name('update.profile'); // Update
