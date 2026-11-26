<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    // Tampilkan profil pengguna yang sedang login
    public function show()
    {
        $user = Auth::user(); // Ambil data pengguna yang sedang login
        return view('profile', compact('user'));
    }

    // Proses untuk memperbarui profil pengguna
    public function update(Request $request)
    {
        $user = Auth::user(); // Ambil data pengguna yang sedang login

        // Validasi inputan pengguna
        $request->validate([
            'nama_user' => 'required|string|max:255',  // Menggunakan nama_user
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id, // Menghindari duplikasi email
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        // Perbarui data pengguna
        $user->nama_user = $request->nama_user;  // Menyesuaikan dengan nama_user
        $user->email = $request->email;

        // Jika ada foto profil baru, unggah foto tersebut
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->save(); // Simpan perubahan

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui');
    }

    // Ubah password pengguna
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|min:6',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        // Periksa apakah password saat ini cocok
        if (Hash::check($request->current_password, $user->password)) {
            // Perbarui password
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->route('profile')->with('success', 'Password berhasil diperbarui');
        } else {
            return back()->withErrors(['current_password' => 'Password saat ini tidak valid']);
        }
    }
}
