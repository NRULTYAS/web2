<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect berdasarkan role user
            $user = Auth::user();

            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'siswa':
                    return redirect()->route('siswa.dashboard');
                default:
                    Auth::logout();
                    return redirect()->route('login')->withErrors([
                        'email' => 'Role tidak dikenali.',
                    ]);
            }
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    // Tampilkan halaman register
    public function showRegister()
    {
        return view('register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'siswa' // default role
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil. Silakan login.');
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
