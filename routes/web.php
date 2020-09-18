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
    Route::get('cart','CartController@cart')->name('front.cart');
    Route::get('checkout','CheckoutController@checkout')->name('front.checkout');
    Route::post('checkout','CheckoutController@store')->name('front.place.order');
    Route::get('order/status/{status}','CheckoutController@final_status')->name('front.order.status');
    Route::get('add-to-cart/{productId}','CartController@addToCart')->name('add.to.cart');
    Route::get('remove-from-cart/{productId}','CartController@removeFormCart')->name('remove.form.cart');
    Route::get('order/{id}/payment','PaymentController@index')->name('front.order.payment');
    Route::post('payment/success','PaymentController@success')->name('front.order.payment.success');
    Route::post('payment/failed','PaymentController@failed')->name('front.order.payment.failed');
    Route::post('payment/cancel','PaymentController@cancel')->name('front.order.payment.cancel');
});

Route::middleware('auth')->namespace('Admin')->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::resource('admin/category','CategoryController');
    Route::resource('admin/product','ProductController');
    Route::resource('admin/user','UserController');
    Route::get('admin/orders','OrderController@index')->name('admin.order.list');
    Route::get('admin/orders/{id}/show','OrderController@show')->name('admin.order.show');
    Route::put('admin/orders/{id}/{status}','OrderController@change_status')->name('admin.order.change.status');
});

Auth::routes(['register'=>false]);
