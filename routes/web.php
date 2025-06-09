<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =============================
// RUTE UTAMA & PRODUK
// =============================

// Halaman utama menampilkan semua produk
Route::get('/', [ProductController::class, 'index'])->name('home');

// Semua aksi CRUD untuk produk (kecuali jika ada yang dikecualikan)
Route::resource('products', ProductController::class);

// Fitur pencarian produk
Route::get('/search', [ProductController::class, 'search'])->name('product.search');

// =============================
// RUTE AUTENTIKASI
// =============================

// Form login & proses login (hanya untuk guest / belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Logout (hanya bisa jika user sudah login)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// =============================
// RUTE DASHBOARD & PROFILE
// =============================

Route::middleware('auth')->group(function () {
    // Dashboard (bisa pakai fitur verified jika diperlukan)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    // Profile edit/update/delete
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =============================
// RUTE KERANJANG BELANJA
// =============================

Route::middleware('auth')->group(function () {
    // Tampilkan isi keranjang
    Route::get('/cart', [ShoppingCartController::class, 'index'])->name('cart.index');

    // Tambah produk ke keranjang
    Route::post('/cart/add', [ShoppingCartController::class, 'store'])->name('cart.store');

    // Hapus produk dari keranjang
    Route::delete('/cart/{id}', [ShoppingCartController::class, 'destroy'])->name('cart.destroy');
});
