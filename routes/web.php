<?php

use App\Http\Controllers\StoreController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use Illuminate\Support\Facades\Route;

// Laravel's authentication middleware uses this conventional route name.
Route::redirect('/login', '/admin/login')->name('login');

Route::controller(StoreController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/products/{product:slug}', 'product')->name('product');
    Route::get('/cart', 'cart')->name('cart');
    Route::post('/cart/{product}', 'addToCart')->name('cart.add');
    Route::patch('/cart/{product}', 'updateCart')->name('cart.update');
    Route::delete('/cart/{product}', 'removeFromCart')->name('cart.remove');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::post('/checkout', 'placeOrder')->name('checkout.place');
    Route::get('/order/{order}/thank-you', 'thankYou')->name('order.thank-you');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () { Route::get('login', [AdminAuthController::class, 'create'])->name('login'); Route::post('login', [AdminAuthController::class, 'store'])->name('login.store'); });
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('categories', AdminCategoryController::class)->except('show');
    Route::resource('products', AdminProductController::class)->except('show');
    Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::patch('orders/{order}', [AdminOrderController::class, 'update'])->name('orders.update');
    Route::post('logout', [AdminAuthController::class, 'destroy'])->name('logout');
});
