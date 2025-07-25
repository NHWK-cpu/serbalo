<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // buat agar setelah login akan ada session
    public function show_login() {
        if(Auth::check()) {
            return back()->with(['message'=>'Anda sudah login']);
        } else {
            return view('login');
        }
    }
    
    public function show_register() {
        if(Auth::check()) {
            return back()->with(['message'=>'Silahkan logout terlebih dahulu untuk membuat akun baru']);
        } else {
            return view('register');
        }
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required',
            'password' => 'required|string',
        ]);

        // Simpan user baru
        $user = User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);

        // Login otomatis setelah register
        auth()->login($user);

        return redirect('/')->with('message', 'Registrasi berhasil!');
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'message' => 'Username atau Password salah.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }


}
