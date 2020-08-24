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

Route::namespace('Front')->group(function (){
    Route::get('/','FrontController@home')->name('front.home');
    Route::get('product/{id}','FrontController@product_details')->name('front.product.details');
    Route::get('cart','CartController@cart')->name('cart');
    Route::get('add-to-cart/{productId}','CartController@addToCart')->name('add.to.cart');
    Route::get('remove-from-cart/{productId}','CartController@removeFormCart')->name('remove.form.cart');
});

Route::middleware('auth')->namespace('Admin')->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('admin/blogs', function () {
        return view('admin.blog');
    });
    Route::resource('admin/category','CategoryController');
    Route::resource('admin/product','ProductController');
    Route::resource('admin/user','UserController');
});

Auth::routes(['register'=>false]);
