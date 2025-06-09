<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- RUTE UTAMA & PRODUK ---

// Homepage utama sekarang menampilkan daftar semua produk dari ProductController method 'index'
Route::get('/', [ProductController::class, 'index'])->name('home');

// Menggunakan Route::resource untuk membuat semua rute CRUD produk secara otomatis.
// Ini akan membuat rute seperti:
// - GET /products/{product}       (untuk method 'show')
// - GET /products/create          (untuk method 'create')
// - POST /products                (untuk method 'store')
// - GET /products/{product}/edit  (untuk method 'edit')
// - PUT/PATCH /products/{product} (untuk method 'update')
// - DELETE /products/{product}    (untuk method 'destroy')
Route::resource('products', ProductController::class);


// --- RUTE AUTENTIKASI (LOGIN, LOGOUT) ---

// Middleware 'guest' memastikan halaman ini hanya bisa diakses oleh pengguna yang BELUM LOGIN.
Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    // Jika kamu butuh halaman registrasi, bisa ditambahkan di sini.
});

// Rute untuk logout hanya bisa diakses oleh user yang SUDAH LOGIN
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// --- RUTE BAWAAN LARAVEL (DASHBOARD & PROFILE) ---
// Rute-rute ini bisa kamu simpan jika masih ingin menggunakannya.

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});