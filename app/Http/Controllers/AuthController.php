<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash; 
use App\Models\User;
use Illuminate\Validation\Rules\Password; 

class AuthController extends Controller
{

    public function showLoginForm()
    {
       
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput($request->only('email'));
        }
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return redirect()->route('login')->withErrors([
            'email' => 'Email atau Password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate();
        $request->session()->regenerateToken(); 
        return redirect('/login'); 
    }
    public function showRegisterForm()
    {
        
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $rules = [ // aturan password
            'name' => ['required', 'string', 'max:255'], 
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed', 
                Password::min(8) 
                          ->numbers(), 
            ],
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput($request->only('name', 'email')); 
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);
        Auth::login($user); 
        return redirect()->intended('/');
    }
}
