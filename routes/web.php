<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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



Route::get('/backstage/product-index', function () {
    return view('backstage.product-index');
});

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
Route::get('/product-index', function () {
    return view('front.product_index');
});
Route::get('/product-intro', function () {
    return view('front.product_intro');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
