<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;


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
});
