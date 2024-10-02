<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\PageController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/t', function () {
//     return view('test');
// });

Route::get('/', [PageController::class, 'home'])->name('home');
Route::post('/vendor-create', [PageController::class, 'vendor_create'])->name('vendor-create');
Route::get('/products/{slug}/{id}', [PageController::class, 'vendor_product'])->name('vendor-product');

Route::get('/pass', function () {

    return Hash::make('@123Surya');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
