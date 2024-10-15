<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\LoginWithGoogle\GoogleController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/pass', function () {
    return Hash::make('@123Surya');
});

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/vendors', [PageController::class, 'vendors'])->name('vendor.view');
Route::post('/vendor-create', [PageController::class, 'vendor_create'])->name('vendor-create');
Route::get('/products/{slug}/{id}', [PageController::class, 'vendor_product'])->name('vendor-product');
Route::get('/product/compare', [PageController::class, 'compare'])->name('compare');
Route::get('/product/cart-page/{id}', [UserController::class, 'cart_page'])->name('cart_page');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');


Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/cart/store', [UserController::class, 'cart_store'])->name('cart-store');


    Route::get('/user/cart', [UserController::class, 'cart'])->name('cart.view');
    Route::delete('/user/cart-delete/{id}', [UserController::class, 'cart_delete'])->name('cart.delete');
    Route::get('/user/cart/checkout', [UserController::class, 'checkout'])->name('checkout.view');
    Route::post('/user/shipping-address/store', [UserController::class, 'shipping_address'])->name('shipping_address.store');
    Route::post('/user/order/store', [UserController::class, 'place_order'])->name('order.store');
    Route::get('/user/order-history', [UserController::class, 'order_history'])->name('history.view');
});

require __DIR__ . '/auth.php';
