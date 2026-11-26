<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    

public function login(Request $request)
{
    // Validasi data input dari pengguna
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Cek apakah autentikasi berhasil
    if (Auth::attempt($request->only('email', 'password'))) {
        // Ambil user yang terautentikasi
        $user = auth()->user();

        // Periksa apakah user adalah admin (id_jenis_user = '1')
        if ($user->id_jenis_user == '1') {  // Pastikan nilai adalah string '1'
            return redirect()->route('admin.dashboard');  // Arahkan ke dashboard admin
        }

        // Jika bukan admin, arahkan ke halaman umum atau home
        return redirect()->route('home');
    }

    // Jika login gagal, kembali ke halaman login dengan pesan error
    return back()->withErrors([
        'password' => 'Password salah atau email tidak terdaftar.',
    ]);
}

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

        // Tampilkan form register
        public function registerForm()
        {
            return view('auth.register');
        }
    
        // Proses register
        public function register(Request $request)
        {
            // Validasi inputan dari pengguna
            $request->validate([
                'nama_user' => 'required|string|max:255',  // Nama pengguna
                'username' => 'required|string|max:255|unique:user', // Validasi username
                'email' => 'required|email|unique:user', // Validasi email
                'password' => 'required|min:6|confirmed', // Validasi password
            ], [
                // Custom error messages
                'password.min' => 'Password harus terdiri dari minimal 6 karakter.',  // Menambahkan pesan khusus untuk password
            ]);
            
            // Menyimpan data pengguna baru ke dalam database
            User::create([
                'nama_user' => $request->nama_user,  // Menggunakan 'nama_user'
                'username' => $request->username,  // Menambahkan 'username'
                'email' => $request->email,
                'password' => Hash::make($request->password), // Enkripsi password
                'id_jenis_user' => $request->id_jenis_user ?? '1', // Menambahkan nilai default '1' jika tidak ada input untuk id_jenis_user
            ]);
        
            // Redirect ke halaman login setelah berhasil registrasi
            return redirect()->route('login')->with('success', 'Registration successful! Please login.');
        }
}
