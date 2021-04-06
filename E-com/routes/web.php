<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;


Route::get('/admins', [AdminController::class,'index']);
Route::post('/admins/admin_login_process', [AdminController::class, 'admin_login_process'])->name('admins.login');
Route::group(['middleware'=>'admin_auth'],function () {
  Route::get('admins/dashboard', [AdminController::class,'dashboard']);
  Route::get('admins/category', [CategoryController::class,'index']);
  Route::get('admins/manage_category', [CategoryController::class,'manage_category']);
  //Route::get('admins/adminpassHashing', [AdminController::class,'adminpassHashing']);
  Route::get('admins/logout', function(){
    session()->forget('ADMIN_LOGIN');
    session()->forget('ADMIN_ID');
    return redirect('admins');
  });



});
