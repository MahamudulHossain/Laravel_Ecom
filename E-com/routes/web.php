<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;




Route::get('/admins', [AdminController::class,'index']);
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
});
