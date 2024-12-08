<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/blade-welcome', function () {
    return view('welcome');
});

Route::get('/auth/login', function () {
    return view('auth.login');
});

Route::get('/dashboard2', function () {
    return view('dashboard.dashboard2');
});

Route::get('/change-profile', function () {
    Route::get('/change-profile', [ProfileController::class, 'showChangeProfile'])->name('change-profile');
    return view('change-profile');
})->name('change-profile');

Route::get('/change-profile', function () {
    return view('change-profile');
})->name('change-profile');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/cart', function () {
    return view('cart');
})->middleware(['auth', 'verified'] )->name('cart');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/products/create', function () {
        $products = Product::where('seller_id', operator: Auth::id())->get();

        return view('products.create', compact('products'));
    })->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/seller/{sellerId}', [ProductController::class, 'getBySellerId']);
require __DIR__.'/auth.php';
