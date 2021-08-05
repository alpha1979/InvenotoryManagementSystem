<?php

//use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
// use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\ProductCartController;
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

Route::get('/',[MainController::class,'index'])->name('main');


Route::resource('products',ProductController::class);
Route::resource('carts',CartController::class)->only(['index']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('products.carts', ProductCartController::class)->only(['store','destroy']);
Route::resource('orders.payments', OrderPaymentController::class)->only(['store','create']);

Route::resource('orders', OrderController::class)->only(['create','store']);