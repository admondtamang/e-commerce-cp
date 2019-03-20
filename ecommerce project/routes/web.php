<?php

Route::get('/', 'IndexController@index');

Route::get('/product-detail/{id}', 'IndexController@detialproduct');
// Route::post('/addToCart/{id}', 'cartController');

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth');

// Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

// Store
Route::resource('/registerStore', 'Auth\RegisterStoreController');

Route::group(['prefix' => 'store'], function () {
    Route::get('login', 'Auth\StoreLoginController@showLoginForm')->name('store.login');
    Route::post('login', 'Auth\StoreLoginController@login')->name('store.login.submit');
    Route::get('/', 'StoreController@index')->name('store.dashboard');
    Route::resource('/products', 'ProductController');
    //Category
    Route::resource('/category', 'CategoryController');
});



//cart
Route::get('/addToCart', 'CartController@addToCart');
Route::get('/cart', 'CartController@index');

Route::get('/list-products', 'IndexController@shop');

//wishlist
Route::get('/wishlist', 'WhishlistController@index');

Route::get('/allProducts', 'ProductController@allProducts');
//profile
Route::resource('/profile', 'ProfileController');
// Route::get('/profile', 'ProfileController@viewProfile')->name('profile');
// // Route::get('/editProfile/{id}', 'ProfileController@editProfile')->name('edit.profile');
// // Route::put('/updateProfile/{id}', 'ProfileController@updateProfile')->name('update.profile'); // Update
