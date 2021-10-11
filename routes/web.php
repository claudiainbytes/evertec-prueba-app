<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\StoreController as AdminStoreController;
use App\Http\Controllers\Store\OrderController as OrderController;

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
/** Purchase order **/
Route::get('/', [OrderController::class,'create']);
Route::post('/orders/checkout', [OrderController::class,'checkout']);
Route::post('/orders/confirm', [OrderController::class,'confirm']);
Route::get('/orders/response/{orderID}', [OrderController::class,'response']);

/** Administrator **/
Route::get('/admin/login', [AdminAuthController::class,'login'])->name('login');
Route::post('/admin/login/validate', [AdminAuthController::class,'validateSession']);
Route::get('/admin/login/off', [AdminAuthController::class,'logout']);

Route::group(['middleware' => 'auth:administrator'], function() {
    Route::get('/admin/dashboard', [AdminStoreController::class,'dashboard']);
    Route::get('/admin/dashboard/orders', [AdminStoreController::class,'getOrders']);
});