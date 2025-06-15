<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SubCategoryController;

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::resource('products', ProductController::class);

Route::get('/search', [ProductController::class, 'search'])->name('products.search');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // === HANYA BAGIAN INI YANG DITAMBAHKAN ===
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    // =======================================
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/cart', [ShoppingCartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [ShoppingCartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{id}', [ShoppingCartController::class, 'destroy'])->name('cart.destroy');

    Route::patch('/cart/{id}/update-quantity', [ShoppingCartController::class, 'updateQuantity'])->name('cart.update_quantity');

    Route::post('/checkout', [ShoppingCartController::class, 'checkout'])->name('cart.checkout');

    Route::get('/order/success/{order}', function (\App\Models\Order $order) {
        return view('order.success', compact('order'));
    })->name('order.success');

    Route::get('/order/failed/{order}', function (\App\Models\Order $order) {
        return view('order.failed', compact('order'));
    })->name('order.failed');

    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

   
    Route::get('/kategori/{slug}', [SubCategoryController::class, 'show']);
    Route::resource('products', ProductController::class);

    Route::get('/order-history', [OrderController::class, 'history'])->name('order.history');

});