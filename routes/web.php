<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard2', function () {
    return view('dashboard2');
})->middleware(['auth'])->name('dashboard2');

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

    Route::get('/transactions/buyer', [TransactionController::class, 'showBuyer'])->name('transactions.buyer');
    Route::get('/transactions/seller', [TransactionController::class, 'showSeller'])->name('transactions.seller');
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/seller/{sellerId}', [ProductController::class, 'getBySellerId']);
require __DIR__.'/auth.php';
