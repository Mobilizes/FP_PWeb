<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/products/create', function () {
        $products = Product::where('seller_id', Auth::id())->get();

        return view('products.create', compact('products'));
    })->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    Route::get('/transactions/buyer', [TransactionController::class, 'showBuyer'])->name('transactions.buyer');
    Route::get('/transactions/seller', [TransactionController::class, 'showSeller'])->name('transactions.seller');
    Route::patch('/transactions/seller/{transaction}/approve', [TransactionController::class, 'sellerApprove'])->name('transactions.sellerApprove');
    Route::patch('/transactions/seller/{transaction}/deny', [TransactionController::class, 'sellerDeny'])->name('transactions.sellerDeny');
    
    Route::delete('/transactions/delete/{transactionId}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/seller/{sellerId}', [ProductController::class, 'getBySellerId']);

require __DIR__.'/auth.php';
