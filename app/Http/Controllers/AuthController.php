<?php

namespace App\Http\Controllers;

// Import class-class yang kita butuhkan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; // <-- Ditambahkan untuk validasi

class AuthController extends Controller
{
    /**
     * Method ini bertugas untuk menampilkan halaman form login.
     * Logikanya hanya mengembalikan file view.
     */
    public function showLoginForm()
    {
        // Mengarahkan ke file di: resources/views/auth/login.blade.php
        return view('auth.login');
    }

    /**
     * Method ini bertugas untuk memproses data yang dikirim dari form login.
     * Ini adalah inti dari logika backend login.
     */
    public function login(Request $request)
    {
        // 1. Membuat aturan validasi.
        $rules = [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];

        // 2. Menjalankan validasi.
        $validator = Validator::make($request->all(), $rules);

        // 3. Jika validasi gagal, kembali ke halaman login dengan pesan error.
        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput($request->only('email'));
        }

        // 4. Jika validasi berhasil, coba lakukan proses login.
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // 5. Jika login berhasil, regenerasi session dan redirect ke dashboard.
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        // 6. Jika kredensial (email/password) salah, kembali ke halaman login.
        return redirect()->route('login')->withErrors([
            'email' => 'Email atau Password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Method untuk memproses logout.
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Menghapus sesi autentikasi

        $request->session()->invalidate(); // Membatalkan sesi yang ada

        $request->session()->regenerateToken(); // Membuat ulang token CSRF

        return redirect('/login'); // Arahkan kembali ke halaman login
    }
}