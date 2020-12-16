<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/home', 'HomeController@index')->name('home');


//Fontend
Route::get('/','HomeController@index' );
Route::get('/trang-chu' , 'HomeController@index');
Route::post('tim-kiem' , 'HomeController@search')->name('tim-kiem');

// Danh muc san pham trang chu
Route::get('danh-muc-san-pham/{catrgory_id}', 'CategoryProduct@show_category_home');
Route::get('danh-muc-thuong-hieu/{brand_id}', 'BrandProduct@show_brand_home');
Route::get('chi-tiet-san-pham/{product_id}', 'ProductController@details_product');

//BackEnd

Route::get ('admin' , 'AdminController@index');

Route::get('dashboard' , 'AdminController@Show_Dashboard')->middleware('check');
Route::post('admin-dashboard' , 'AdminController@Dashboard');
Route::get('logout' , 'AdminController@logout');
Route::post('admin-dashboard' , 'AdminController@Dashboard');

//Category Product

Route::middleware('check')->group(function(){
    Route::get('add-category-product' , 'CategoryProduct@add_category_product');
    Route::get('all-category-product' , 'CategoryProduct@all_category_product');

    Route::get('edit-category-product/{category_product_id}' , 'CategoryProduct@edit_category_product');
    Route::get('delete-category-product/{category_product_id}' , 'CategoryProduct@delete_category_product');
    Route::post('update-category-product/{category_product_id}' , 'CategoryProduct@update_category_product');

    Route::post('save-category-product' , 'CategoryProduct@save_category_product');

    Route::get('unactive-category-product/{category_product_id}' , 'CategoryProduct@unactive_category_product');
    Route::get('active-category-product/{category_product_id}' , 'CategoryProduct@active_category_product');

});

// Brand Product

Route::middleware('check')->group(function(){

Route::get('add-brand-product' , 'BrandProduct@add_brand_product')->middleware('check');
Route::get('all-brand-product' , 'BrandProduct@all_brand_product');

Route::get('edit-brand-product/{brand_product_id}' , 'BrandProduct@edit_brand_product');
Route::get('delete-brand-product/{brand_product_id}' , 'BrandProduct@delete_brand_product');
Route::post('update-brand-product/{brand_product_id}' , 'BrandProduct@update_brand_product');

Route::post('save-brand-product' , 'BrandProduct@save_brand_product');

Route::get('unactive-brand-product/{brand_product_id}' , 'BrandProduct@unactive_brand_product');
Route::get('active-brand-product/{brand_product_id}' , 'BrandProduct@active_brand_product');

});

// Product
Route::middleware('check')->group(function(){
Route::get('add-product' , 'ProductController@add_product');
Route::get('all-product' , 'ProductController@all_product');

Route::get('edit-product/{product_id}' , 'ProductController@edit_product');
Route::get('delete-product/{product_id}' , 'ProductController@delete_product');

Route::post('update-product/{product_id}' , 'ProductController@update_product');

Route::post('save-product' , 'ProductController@save_product');

Route::get('unactive-product/{product_id}' , 'ProductController@unactive_product');
Route::get('active-product/{product_id}' , 'ProductController@active_product');

});

// Cart
Route::post('save-cart' , 'CartController@save_cart')->name('save-cart');
Route::post('update-cart-quantity' , 'CartController@update_cart_quantity');

Route::post('add-cart-ajax' , 'CartController@add_cart_ajax');

Route::get('show-cart' , 'CartController@show_cart' )->name('show-cart');

Route::get('delete-cart/{rowId}', 'CartController@delete_cart');
Route::get('delete-cart/{rowId}', 'CartController@delete_cart1')->name('delete-cart');

// Check out
Route::get('login-checkout', 'CheckoutController@login_checkout')->name('login-checkout');
Route::get('logout-checkout', 'CheckoutController@logout_checkout')->name('logout-checkout');
Route::post('login-customer', 'CheckoutController@login_customer')->name('login-customer');
Route::post('pay-order', 'CheckoutController@pay_order')->name('pay-order');
Route::get('checkout', 'CheckoutController@checkout')->name('checkout');
Route::post('add-customer' , 'CheckoutController@add_customer')->name('add-customer');
Route::post('save-checkout-customer' , 'CheckoutController@save_checkout_customer')->name('save-checkout-customer');
Route::get('payment', 'CheckoutController@payment')->name('payment');
Route::post('select-delivery-home', 'CheckoutController@select_delivery_home')->name('select-delivery-home');

Route::post('calculate-ship', 'CheckoutController@calculate_ship')->name('calculate-ship');

Route::post('confirm-order', 'CheckoutController@confirm_order')->name('confirm-order');

// Order

Route::group(['middleware' => ['check']], function () {
    Route::get('manage-order' , 'OrderController@manage_order')->name('manage-order');
    Route::get('view-order/{order_code}' ,'OrderController@view_order')->name('view-order');
    Route::get('print-order' , 'OrderController@print_order');
    // Route::get('delete-order/{id}' ,'CheckoutController@delete_order')->name('delete-order');
});

// Send Email
Route::get('send-mail' ,'HomeController@send_mail');

// Delivery
Route::get('delivery' , 'DeliveryController@delivery')->name('delivery');

Route::post('select-delivery' , 'DeliveryController@select_delivery');
Route::post('insert-delivery' , 'DeliveryController@insert_delivery')->name('insert-delivery');
Route::post('select-ship' , 'DeliveryController@select_ship');
