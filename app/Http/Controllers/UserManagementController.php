<?php

namespace App\Http\Controllers;

use App\Models\JenisUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        // Ambil semua user dengan relasi jenisUser
        $users = User::with('jenisUser')->paginate(10);
        return view('layouts admin.user.index', compact('users'));
    }

    // Tampilkan form tambah user baru
    public function create()
    {
        // Ambil semua jenis user untuk opsi role
        $roles = JenisUser::all();
        return view('layouts admin.user.create', compact('roles'));
    }

    // Simpan user baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required|string|max:255|unique:user,nama_user',
            'email' => 'required|string|email|max:255|unique:user,email',
            'password' => 'required|string|min:6|confirmed',
            'id_jenis_user' => 'required|exists:jenis_user,id_jenis_user',
        ]);

        User::create([
            'nama_user' => $request->nama_user,
            'email' => $request->email,
            'username' => $request->username ?? $request->nama_user,
            'password' => Hash::make($request->password),
            'id_jenis_user' => $request->id_jenis_user,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    // Tampilkan form edit user
    public function edit($id_user)
    {
        $user = User::findOrFail($id_user);
        $roles = JenisUser::all();
        return view('layouts admin.user.edit', compact('user', 'roles'));
    }

    // Update data user
    public function update(Request $request, $id_user)
    {
        $user = User::findOrFail($id_user);

        $request->validate([
            'nama_user' => 'required|string|max:255|unique:user,nama_user,' . $user->id_user . ',id_user',
            'email' => 'required|string|email|max:255|unique:user,email,' . $user->id_user . ',id_user',
            'id_jenis_user' => 'required|exists:jenis_user,id_jenis_user',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $dataUpdate = [
            'nama_user' => $request->nama_user,
            'email' => $request->email,
            'id_jenis_user' => $request->id_jenis_user,
        ];

        if ($request->filled('password')) {
            $dataUpdate['password'] = Hash::make($request->password);
        }

        $user->update($dataUpdate);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');
    }

    // Hapus user
    public function destroy($id_user)
    {
        $user = User::findOrFail($id_user);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }
}
