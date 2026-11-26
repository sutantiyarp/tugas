<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user(); // Ambil data pengguna yang sedang login
        return view('profil.show', compact('user')); // Menampilkan halaman profil dengan data pengguna
    }

    // Menampilkan form untuk mengedit profil pengguna yang sedang login
    public function edit()
    {
        $user = Auth::user(); // Ambil data pengguna yang sedang login
        return view('profil.profil', compact('user')); // Menampilkan form edit dengan data pengguna
    }

    // Mengupdate profil pengguna berdasarkan data yang diterima
    public function update(Request $request)
    {
        $user = Auth::user(); // Mengambil data pengguna yang sedang login
    
        // Validasi inputan pengguna
        $request->validate([
            'nama_user' => [
                'required',
                'string',
                'max:255',
                // Menambahkan rule unik untuk nama_user kecuali nama_user yang sedang digunakan
                'unique:user,nama_user,' . $user->id_user . ',id_user', 
            ],
            'email' => 'required|string|email|max:255|unique:user,email,' . $user->id_user . ',id_user', // Menggunakan ignore dengan id_user sebagai parameter
        ], [
            'nama_user.unique' => 'Nama pengguna sudah terdaftar. Silakan pilih nama lain.',  // Pesan error jika nama sudah digunakan
        ]);
    
        // Memperbarui data pengguna
        $user->update([
            'nama_user' => $request->nama_user,
            'email' => $request->email,
        ]);
    
        // Mengarahkan kembali ke halaman profil dengan pesan sukses
        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }
    
}
