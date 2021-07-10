<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReviewsController;

Route::get('/', [FrontController::class,'index']);
Route::get('product/{slug}', [FrontController::class,'product_detail']);
Route::get('category/{slug}', [FrontController::class,'category_page']);
Route::post('addtocart', [FrontController::class,'add_to_cart']);
Route::get('mycart', [FrontController::class,'mycart']);
Route::get('/admins', [AdminController::class,'index']);
Route::get('search/{str}', [FrontController::class,'search']);
Route::get('/registration', [FrontController::class,'registration']);
Route::post('registration_form', [FrontController::class, 'registration_form'])->name('registration.registration_form');
Route::post('user_login_form', [FrontController::class, 'user_login_form'])->name('userLogIn.user_login_form');
Route::post('order_form', [FrontController::class, 'order_form'])->name('order.order_form');
Route::post('/apply_coupon', [FrontController::class,'apply_coupon']);
Route::get('/order_placed', [FrontController::class,'order_placed']);
Route::get('logout', [FrontController::class,'logout']);
Route::get('checkout', [FrontController::class,'checkout']);
Route::post('/product_review', [FrontController::class,'product_review']);
Route::group(['middleware'=>'FrontAuth'],function () {
  Route::get('/orders_list', [FrontController::class,'orders_list']);
  Route::get('/order_details/{id}', [FrontController::class,'order_details']);

});

Route::post('/admins/admin_login_process', [AdminController::class, 'admin_login_process'])->name('admins.login');
Route::group(['middleware'=>'admin_auth'],function () {
  //Route::get('admins/adminpassHashing', [AdminController::class,'adminpassHashing']);
  Route::get('admins/logout', function(){
    session()->forget('ADMIN_LOGIN');
    session()->forget('ADMIN_ID');
    return redirect('admins');
  });
  Route::get('admins/dashboard', [AdminController::class,'dashboard']);

  Route::get('admins/category', [CategoryController::class,'index']);
  Route::get('admins/category/manage_category', [CategoryController::class,'manage_category']);
  Route::get('admins/category/manage_category/{id}', [CategoryController::class,'manage_category']);
  Route::post('admins/category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('admins.category.manage_category_process');
  Route::get('admins/category/manage_category/status/{status}/{id}', [CategoryController::class,'manage_category_status']);
  Route::get('admins/category/delete/{id}',[CategoryController::class,'delete']);

  Route::get('admins/coupon', [CouponController::class,'index']);
  Route::get('admins/coupon/manage_coupon', [CouponController::class,'manage_coupon']);
  Route::get('admins/coupon/manage_coupon/{id}', [CouponController::class,'manage_coupon']);
  Route::post('admins/coupon/manage_coupon_process',[CouponController::class,'manage_coupon_process'])->name('admins.coupon.manage_coupon_process');
  Route::get('admins/coupon/manage_coupon/status/{status}/{id}', [CouponController::class,'manage_coupon_status']);
  Route::get('admins/coupon/delete/{id}',[CouponController::class,'delete']);

  Route::get('admins/color', [ColorController::class,'index']);
  Route::get('admins/color/manage_color', [ColorController::class,'manage_color']);
  Route::get('admins/color/manage_color/{id}', [ColorController::class,'manage_color']);
  Route::post('admins/color/manage_color_process',[ColorController::class,'manage_color_process'])->name('admins.color.manage_color_process');
  Route::get('admins/color/manage_color/status/{status}/{id}', [ColorController::class,'manage_color_status']);
  Route::get('admins/color/delete/{id}',[ColorController::class,'delete']);

  Route::get('admins/size', [SizeController::class,'index']);
  Route::get('admins/size/manage_size', [SizeController::class,'manage_size']);
  Route::get('admins/size/manage_size/{id}', [SizeController::class,'manage_size']);
  Route::post('admins/size/manage_size_process',[SizeController::class,'manage_size_process'])->name('admins.size.manage_size_process');
  Route::get('admins/size/manage_size/status/{status}/{id}', [SizeController::class,'manage_size_status']);
  Route::get('admins/size/delete/{id}',[SizeController::class,'delete']);

  Route::get('admins/product', [ProductController::class,'index']);
  Route::get('admins/product/manage_product', [ProductController::class,'manage_product']);
  Route::get('admins/product/manage_product/{id}', [ProductController::class,'manage_product']);
  Route::post('admins/product/manage_product_process',[ProductController::class,'manage_product_process'])->name('admins.product.manage_product_process');
  Route::get('admins/product/manage_product/status/{status}/{id}', [ProductController::class,'manage_product_status']);
  Route::get('admins/product/delete/{id}',[ProductController::class,'delete']);
  Route::get('admins/product/manage_product_delete/{paid}/{pid}',[ProductController::class,'manage_product_delete']);//product attribute delete
  Route::get('admins/product/manage_product_imgs_delete/{piid}/{pid}',[ProductController::class,'manage_product_imgs_delete']);//product More images delete

  Route::get('admins/brand', [BrandController::class,'index']);
  Route::get('admins/brand/manage_brand', [BrandController::class,'manage_brand']);
  Route::get('admins/brand/manage_brand/{id}', [BrandController::class,'manage_brand']);
  Route::post('admins/brand/manage_brand_process',[BrandController::class,'manage_brand_process'])->name('admins.brand.manage_brand_process');
  Route::get('admins/brand/manage_brand/status/{status}/{id}', [BrandController::class,'manage_brand_status']);
  Route::get('admins/brand/delete/{id}',[BrandController::class,'delete']);

  Route::get('admins/banner', [BannerController::class,'index']);
  Route::get('admins/banner/manage_banner', [BannerController::class,'manage_banner']);
  Route::get('admins/banner/manage_banner/{id}', [BannerController::class,'manage_banner']);
  Route::post('admins/banner/manage_banner_process',[BannerController::class,'manage_banner_process'])->name('admins.banner.manage_banner_process');
  Route::get('admins/banner/manage_banner/status/{status}/{id}', [BannerController::class,'manage_banner_status']);
  Route::get('admins/banner/delete/{id}',[BannerController::class,'delete']);

  Route::get('admins/customer', [CustomerController::class,'index']);
  Route::get('admins/customer/show_customer/{id}', [CustomerController::class,'show']);
  Route::get('admins/customer/manage_customer/status/{status}/{id}', [CustomerController::class,'manage_customer_status']);
  Route::get('admins/orders', [OrderController::class,'index']);
  Route::get('admins/order_details/{id}', [OrderController::class,'detail']);
  Route::get('admin/order_status_update/{val}/{id}', [OrderController::class,'order_status_update']);

  Route::get('admins/reviews', [ReviewsController::class,'index']);
  Route::get('admins/reviews/manage_reviews/{status}/{id}', [ReviewsController::class,'manage_reviews_status']);
  Route::get('admins/reviews/delete/{id}',[ReviewsController::class,'delete']);

});
