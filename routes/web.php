<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Controller;



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





Route::get('/', function () {
    return view('front.hompage');
});
Route::get('/addAcount', function () {
    return view('front.addAccount');
});
Route::get('/forget', function () {
    return view('front.forgetPassword');
});
Route::get('/logtest', function () {
    return view('front.login');
});
Route::get('/paydone', function () {
    return view('front.pay-done');
});
Route::get('/pay', function () {
    return view('front.pay');
});
Route::get('/cart-index', function () {
    return view('front.product_cart');
});
Route::get('/customer-center', function () {
    return view('front.product_customer_center');
});

Route::get('/product-index/{page}',[Controller::class,'product_index']);

Route::post('/customer-center/change-name',[AccountController::class,'change_name']);

Route::get('/product-intro/{id}', [Controller::class,'product_intro']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/backstage')->group(function () {
    Route::get('/product-index',[ProductController::class,'index']);    //列表頁
    Route::get('/product-create',[ProductController::class,'create']);    //新增頁
    Route::post('/product-store',[ProductController::class,'store']);    //儲存
    Route::get('/product-edit/{id}',[ProductController::class,'edit']);    //編輯
    Route::post('/product-update/{id}',[ProductController::class,'update']);    //更新
    Route::post('/product-delete/{id}',[ProductController::class,'destroy']);    //刪除
});
