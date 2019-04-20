<?php

Route::get('/', 'IndexController@index');
Route::get('/cat/{id}', 'IndexController@listByCat')->name('cats');


Route::get('/product-detail/{id}', 'IndexController@detialproduct')->name('product.detail');
// Route::post('/addToCart/{id}', 'cartController');

Auth::routes();

//iNDEX 
Route::get('/list-products', 'IndexController@shop');
Route::get('/brands', 'IndexController@viewUser');
Route::get('/home', 'HomeController@index');

// Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::get('/products', 'AdminController@allProducts')->name('products.all');
    // Route::get('/order', 'StoreController@order')->name('store.order');
    Route::get('/user', 'AdminController@viewUser')->name('admin.user');
    Route::get('/category', 'AdminController@viewCategory')->name('admin.category');
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

//wishlist
Route::resource('wishlist', 'WishlistController');

//Invoice
Route::get('invoice', function () {
    return view('invoice');
});

//Order
Route::resource('checkout', 'OrderController');

//brands

Route::get('/allProducts', 'ProductController@allProducts');
//profile
Route::resource('/profile', 'ProfileController');

//product search
Route::post('search', 'SearchController@search')->name('product.search');


// shipping
Route::get('shipping', 'ProfileController@editShipping')->name('edit.shipping');
Route::post('shipping', 'ProfileController@submitShipping')->name('submit.shipping');
