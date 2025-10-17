<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // 1️⃣ Menampilkan halaman login
    public function showLogin()
    {
        return view('Login');
    }

    // 2️⃣ Menerima input login dan memeriksa kecocokan
    public function login(Request $request)
    {
        // Validasi agar username dan password tidak kosong
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
        ]);

        // Daftar user sementara (variabel lokal)
        $users = [
            ['username' => 'admin', 'password' => '12345'],
            ['username' => 'dian', 'password' => 'abcd'],
        ];

        // Cek apakah username dan password cocok
        $validUser = collect($users)->firstWhere('username', $request->username);

        if ($validUser && $validUser['password'] === $request->password) {
            // Jika cocok → redirect ke dashboard sambil kirim data username
            return redirect()->route('dashboard')->with('username', $request->username);
        } else {
            // Jika salah → kembali ke login dengan pesan error
            return redirect()->route('login')->with('error', 'Username atau password salah!');
        }
    }

    // 3️⃣ Menampilkan dashboard
    public function showDashboard(Request $request)
    {
        $username = session('username');

        if (!$username) {
            // Jika belum login, kembalikan ke halaman login
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu!');
        }

        return view('Dashboard', ['username' => $username]);
    }
}
