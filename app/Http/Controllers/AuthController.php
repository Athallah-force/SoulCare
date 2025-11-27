<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ---------------------------
    // SHOW REGISTER PAGE
    // ---------------------------
    public function showRegister()
    {
        return view('auth.register');
    }

    // ---------------------------
    // PROSES REGISTER
    // ---------------------------
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'nomor_telepon' => 'nullable',
            'tipe_pengguna' => 'required|in:Client,Professional'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomor_telepon' => $request->nomor_telepon,
            'tipe_pengguna' => $request->tipe_pengguna,
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    // ---------------------------
    // SHOW LOGIN PAGE
    // ---------------------------
    public function showLogin()
    {
        return view('auth.login');
    }

    // ---------------------------
    // PROSES LOGIN
    // ---------------------------
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect('/dashboard');
        }

        return back()->withErrors(['login' => 'Email atau password salah!']);
    }

    // ---------------------------
    // LOGOUT
    // ---------------------------
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

