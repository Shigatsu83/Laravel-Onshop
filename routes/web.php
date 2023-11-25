<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'productList'])->name('products.list');

Route::get('auth/google',[GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback',[GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
Route::get('logout', [GoogleController::class, 'logout']);
Route::get('register', [GoogleController::class, 'register'])->name('reg');

// Cart Controller
Route::middleware('isLogin')->group(function(){
    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
});