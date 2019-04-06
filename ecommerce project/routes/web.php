<?php

Route::get('/', 'IndexController@index');

Route::get('/product-detail/{id}', 'IndexController@detialproduct')->name('product.detail');
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
    Route::resource('/products', 'ProductController');
    Route::get('/order', 'StoreController@order')->name('store.order');
    Route::get('/', 'StoreController@index')->name('store.dashboard');
    //Category
    Route::resource('/category', 'CategoryController');
});

//contact
Route::get('contact', function () {
    return view('contact');
});

//cart
Route::post('/addToCart', 'CartController@addToCart')->name('addToCart');
Route::resource('/cart', 'CartController');

Route::get('/list-products', 'IndexController@shop');

//wishlist
Route::get('/wishlist', 'WhishlistController@index');

//Order
Route::resource('checkout', 'OrderController');


Route::get('/allProducts', 'ProductController@allProducts');
//profile
Route::resource('/profile', 'ProfileController');
// Route::get('/profile', 'ProfileController@viewProfile')->name('profile');
Route::put('/editProfile/{id}', 'ProfileController@editProfile')->name('edit.profile');
// // Route::put('/updateProfile/{id}', 'ProfileController@updateProfile')->name('update.profile'); // Update


//product search
Route::post('search', 'SearchController@search')->name('product.search');


// shipping
Route::get('shipping', 'ProfileController@editShipping')->name('edit.shipping');
Route::post('shipping', 'ProfileController@submitShipping')->name('submit.shipping');
