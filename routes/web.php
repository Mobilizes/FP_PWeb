<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Transaction;

Route::get('/', function () {
    $products = Product::all();
    return view('homepage', compact('products'));
});

Route::get('/product', function () {
    $products = Product::all();
    return view('product', compact('products'));
});

Route::get('/blade-welcome', function () {
    return view('welcome');
});

Route::get('/auth/login', function () {
    return view('auth.login');
});

Route::get('/purchasetest', function () {
    return view('purchasetest');
})->name('purchasetest');

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

// Route::get('/cart', function () {
//     $cart = Cart::all();
//     return view('cart', compact('cart'));
//     // return view('cart');
// })->middleware(['auth', 'verified'] )->name('cart');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/dashboard-profile', function () {
        return view('dashboard.change-profile', [
            'user' => Auth::user(),
        ]);
    })->name('dashboard.profile');

    Route::get('/dashboard-sale', function () {
        $products = Product::where('seller_id', Auth::id())->get();
        return view('dashboard.product-for-sale', compact('products'));
    })->name('dashboard.sale');

    // Route::get('/transactions', function () {
    //     return view('dashboard.transactions');
    // })->name('transactions');

    Route::Get('/sales-transactions', function () {
        return view('dashboard.sales-transactions');
    })->name('dashboard.sales-transactions');

    Route::Get('/purchase-transactions', function () {
        return view('dashboard.purchase-transactions');
    })->name('dashboard.purchase-transactions');

    Route::get('/products/create', function () {
        $products = Product::where('seller_id', operator: Auth::id())->get();

        return view('products.create', compact('products'));
    })->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    Route::get('/transactions/buyer', [TransactionController::class, 'showBuyer'])->name('transactions.buyer');
    Route::patch('/transactions/buyer/{transaction}/confirm', [TransactionController::class, 'buyerConfirm'])->name('transactions.buyerConfirm');

    Route::get('/transactions/seller', [TransactionController::class, 'showSeller'])->name('transactions.seller');
    Route::patch('/transactions/seller/{transaction}/approve', [TransactionController::class, 'sellerApprove'])->name('transactions.sellerApprove');
    Route::patch('/transactions/seller/{transaction}/deny', [TransactionController::class, 'sellerDeny'])->name('transactions.sellerDeny');

    Route::get('/example/transactions/buyer', function () {
        $carts = Cart::where("buyer_id", '=', Auth::id())->with('transaction')->get();
        $inProgressTransactions = $carts->pluck('transaction')->where('status', '=', 'In Progress')->filter();
        $pendingTransactions = $carts->pluck('transaction')->where('status', '=', 'Pending')->filter();
        return view('transactions.buyer', compact('inProgressTransactions', 'pendingTransactions'));
    })->name('example.transactions.buyer');

    Route::get('/example/transactions/seller', function () {
        $transactions = Transaction::whereHas('cart.products', function ($query) {
            $query->where('seller_id', Auth::id());
        })
        ->where('status', '=', 'Pending')
        ->whereDoesntHave('sellers', function ($query) {
            $query->where('seller_id', Auth::id())->where('approved', true);
        })->get();

        if ($transactions->count() === 0) { // if no transactions
            return view('dashboard.sales-transactions', compact('transactions'));
        }

        return view('transactions.seller', compact('transactions'));
    })->name('example.transactions.seller');

    Route::delete('/transactions/delete/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

    Route::get('/cart', [CartController::class, 'showCurrentCart'])->name('cart.show');


    Route::post('/cart/{cart}/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/add-to-cart', [CartController::class, 'storeAndAdd'])->name('cart.storeAndAdd');
    Route::get('/check-cart', [CartController::class, 'checkCart'])->name('cart.checkCart');
    Route::post('/cart/{cart}/update', [CartController::class, 'update'])->name('cart.update');
    // Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
});
    
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/seller/{sellerId}', [ProductController::class, 'getBySellerId']);
require __DIR__.'/auth.php';
