<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Menampilkan halaman login
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && $request->password === $user->password) { // Tidak menggunakan Hash::check
            Auth::login($user);

            // Redirect ke halaman dashboard tanpa membedakan peran
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['loginError' => 'Username atau password salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
