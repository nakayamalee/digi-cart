<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Middleware\Authenticate;



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
})->name('homepage');
Route::get('/addAcount', function () {
    return view('front.addAccount');
});
Route::get('/forget', function () {
    return view('front.forgetPassword');
});

Route::get('/signin', function () {
    return view('front.login');
})->name('signin');


Route::post('/add_cart',[Controller::class,'add_cart']);

Route::middleware(['auth'])->get('/pay', [Controller::class,'pay']);

Route::middleware(['auth'])->get('/cart-index', [Controller::class,'cart_index']);
Route::middleware(['auth'])->post('/create_order',[Controller::class,'create_order']);
Route::middleware(['auth'])->get('/paydone/{order_id}',[Controller::class,'pay_done']);

// Route::middleware(['auth'])->get('/customer-center', function () {
//     return view('front.product_customer_center');
// });
Route::middleware(['auth'])->get('/customer-center', [Controller::class,'customer_center']);

Route::get('/product-index/{page}',[Controller::class,'product_index']);

Route::get('/product-intro/{id}', [Controller::class,'product_intro']);

Route::post('/customer-center/change-name',[AccountController::class,'change_name']);

Auth::routes();

Route::middleware([Authenticate::class])->middleware([AccountTypeIsValid::class])->get('/home', [HomeController::class, 'index'])->name('home');

//後台登入
Route::prefix('/backstage')->middleware(['auth','AccountTypeIsValid'])->group(function () {
    Route::get('/',[ProductController::class,'index']);    //列表頁
    Route::get('/product-create',[ProductController::class,'create']);    //新增頁
    Route::post('/product-store',[ProductController::class,'store']);    //儲存
    Route::get('/product-edit/{id}',[ProductController::class,'edit']);    //編輯
    Route::post('/product-update/{id}',[ProductController::class,'update']);    //更新
    Route::post('/product-delete/{id}',[ProductController::class,'destroy']);    //刪除
});
