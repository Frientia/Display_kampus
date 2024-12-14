<?php

namespace App\Http\Controllers;

use App\Models\Akun; // Pastikan model User terhubung
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        // Cari akun berdasarkan username
        $akun = Akun::where('username', $request->username)->first();
    
        if ($akun && Hash::check($request->password, $akun->password)) {
            // Login menggunakan Auth::login() agar Laravel mengenali sesi pengguna
            Auth::login($akun);  // Login pengguna
    
            // Redirect ke dashboard
            return redirect()->route('dashboard')->with('success', 'Selamat datang, Anda berhasil login!');
        }
    
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
{
    Auth::logout();  // Logout pengguna
    $request->session()->invalidate();  // Hapus sesi
    $request->session()->regenerateToken();  // Hapus token CSRF

    return redirect('/login')->with('warning', 'Logout berhasil! Sampai jumpa lagi.');
}

    
}
