<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('pages.login'); // Pastikan file ada di resources/views/auth/login.blade.php
    }

    public function userLogout(){
        Auth::logout();
        return redirect('/login');
    }

    public function loginWeb(Request $request)
    {
        // Validasi input dari form login
        $request->validate([
            'email' => 'required|string|email',    // Email wajib diisi dan harus valid
            'password' => 'required|string',      // Password wajib diisi
        ]);

        // Cek kredensial login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Regenerate session untuk keamanan
            $request->session()->regenerate();

            // Redirect ke dashboard atau halaman utama setelah login berhasil
            return redirect()->intended('/beranda')->with('success', 'Login berhasil! Selamat datang.');
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email'); // Input email akan dipertahankan
    }


    /**
     * Login user dan generate token.
     */
    public function login(Request $request)
    {
        Log::info('Data login yang diterima:', $request->all());

        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Periksa password
        // if (!$user || !Hash::check($request->password, $user->password)) {
        //     Log::info('User tidak ditemukan:', ['email' => $request->email]);
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Email atau password salah',
        //     ], 401);
        // }

        if (!$user) {
            Log::warning('User tidak ditemukan:', ['email' => $request->email]);
        }

        if (!Hash::check($request->password, $user->password)) {
            Log::warning('Password salah:', [
                'input_password' => $request->password,
                'hashed_password' => $user->password
            ]);
        }


        // Buat token menggunakan Sanctum
        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Login berhasil',
            'data' => [
                'user' => $user,
                'token' => $token,
            ],
        ]);
    }

    /**
     * Logout user dan hapus token.
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
 
        return response()->json([
            'status' => 'success',
            'message' => 'Logout berhasil',
        ]);
    }

    /**
     * Ambil data user yang sedang login.
     */
    public function user(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'data' => $request->user(),
        ]);
    }
}