<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\DesparController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/about', function () {
    return view('desa.about');
});

Route::get('/usaha', function () {
    return view('desa.usaha');
});

Route::get('/contact', function () {
    return view('desa.contact');
});

Route::get('/testimoni', function () {
    return view('desa.testimoni');
});

Route::get('/peta', function () {
    return view('desa.peta');
});

Route::get('/rekomendasi', function () {
    return view('desa.rekomendasi');
});

Route::get('/event', function () {
    return view('desa.event');
});

Route::get('/booking', function () {
    return view('desa.booking');
});

Route::get('/wisata/desa-lembah-hijau', function () {
    return view('wisata.desa-lembah-hijau');
});

Route::get('/wisata/desa-air-jernih', function () {
    return view('wisata.desa-air-jernih');
});

Route::get('/wisata/desa-bambu-rindu', function () {
    return view('wisata.desa-bambu-rindu');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'registerForm'])->name('register');

// Rute untuk proses register (POST)
Route::post('/register', [LoginController::class, 'register'])->name('register.post');

// Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
// Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');  // Halaman profil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit'); // Halaman edit profil
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update'); // Proses update profil
});

// Route::get('/dashboard', function () {
//     return view('home');
// })->middleware('auth');

    // Dashboard
    Route::get('home', [DashboardController::class, 'index'])->name('home');

Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
Route::get('/admin/app', [AdminController::class, 'showApp'])->name('admin.app');

    Route::get('/admin/users', [UserManagementController::class, 'index'])->name('admin.users.index'); // Menampilkan daftar pengguna
    Route::get('/admin/users/create', [UserManagementController::class, 'create'])->name('admin.users.create'); // Form untuk menambah pengguna
    Route::post('/admin/users', [UserManagementController::class, 'store'])->name('admin.users.store'); // Menyimpan pengguna baru
    Route::get('/admin/users/{id_user}/edit', [UserManagementController::class, 'edit'])->name('admin.users.edit'); // Form untuk mengedit pengguna
    Route::put('/admin/users/{id_user}', [UserManagementController::class, 'update'])->name('admin.users.update'); // Menyimpan perubahan pengguna
    Route::delete('/admin/users/{id_user}', [UserManagementController::class, 'destroy'])->name('admin.users.destroy'); // Menghapus pengguna

    // Route::get('/despar', [DesparController::class, 'index'])->name('despar.index');
    // Route::get('/despar/create', [DesparController::class, 'create'])->name('despar.create');
    // Route::post('/despar', [DesparController::class, 'store'])->name('despar.store');
    // Route::get('/despar/{id}', [DesparController::class, 'show'])->name('despar.show');
    // Route::get('/despar/{id}/edit', [DesparController::class, 'edit'])->name('despar.edit');
    // Route::put('/despar/{id}', [DesparController::class, 'update'])->name('despar.update');
    // Route::delete('/despar/{id}', [DesparController::class, 'destroy'])->name('despar.destroy');

    Route::resource('despar', DesparController::class);
    Route::resource('provinsi', ProvinsiController::class);
    Route::resource('kabupaten', KabupatenController::class);
    Route::resource('kecamatan', KecamatanController::class);
    Route::resource('desa', DesaController::class);