<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->middleware('auth')
    ->name('products.show');

Route::get('/cart', [CartController::class, 'index'])
    ->middleware('auth')
    ->name('cart.index');

Route::post('/cart/{product}', [CartController::class, 'add'])
    ->middleware('auth')
    ->name('cart.add');

Route::patch('/cart/{product}', [CartController::class, 'updateQuantity'])
    ->middleware('auth')
    ->name('cart.update');

Route::delete('/cart/{id}', [CartController::class, 'remove'])
    ->middleware('auth')
    ->name('cart.remove');

Route::delete('/cart', [CartController::class, 'clear'])
    ->middleware('auth')
    ->name('cart.clear');

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/products', [ProductController::class, 'index'])
    ->middleware('auth')
    ->name('products.index');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
