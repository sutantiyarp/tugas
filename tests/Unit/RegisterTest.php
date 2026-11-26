<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class RegisterTest extends TestCase
{
    // use RefreshDatabase; // Untuk memastikan database di-reset setiap kali pengujian dijalankan

    /**
     * Test registrasi dengan data valid.
     */
    public function test_register_with_valid_data()
    {
        $response = $this->post('/register', [
            'nama_user' => 'John',
            'username' => 'johndoe',
            'email' => 'johndoe@gmail.com',
            'password' => '123456',
            'password_confirmation' => '123456',
        ]);

        $this->assertDatabaseHas('user', [ // Memastikan tabel benar
            'email' => 'johndoe@gmail.com', // Email diperbaiki
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHas('success', 'Registration successful! Please login.');
    }

    /**
     * Test registrasi dengan email yang sudah terdaftar.
     */
    public function test_register_with_existing_email()
    {
        User::create([
            'nama_user' => 'Sutan',
            'username' => 'Sutantiyar28',
            'email' => 'sutan@gmail.com',
            'password' => Hash::make('123456'),
            'id_jenis_user' => "1",
        ]);

        $response = $this->post('/register', [
            'nama_user' => 'suutan',
            'username' => 'suutantiyar', // Pastikan username berbeda agar hanya email yang diuji
            'email' => 'sutan@gmail.com', // Email yang sudah ada
            'password' => '123456',
            'password_confirmation' => '123456',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /**
     * Test registrasi dengan password yang tidak sesuai konfirmasi.
     */
    public function test_register_with_non_matching_passwords()
    {
        $response = $this->post('/register', [
            'nama_user' => 'John Doe',
            'username' => 'john_doe',
            'email' => 'johndoe@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password124', // Password tidak cocok
        ]);

        $response->assertSessionHasErrors('password');
    }

    /**
     * Test registrasi dengan username yang sudah terdaftar.
     */
    public function test_register_with_existing_username()
    {
        User::create([
            'nama_user' => 'Sutan',
            'username' => 'Sutantiyar29',
            'email' => 'sutantiyar@gmail.com',
            'password' => Hash::make('123456'),
            'id_jenis_user' => 1,
        ]);

        $response = $this->post('/register', [
            'nama_user' => 'Sutan',
            'username' => 'Sutantiyar', // Username yang sudah ada
            'email' => 'sutantiyar28@gmail.com', // Email baru agar validasi hanya fokus ke username
            'password' => '123456',
            'password_confirmation' => '123456',
        ]);

        $response->assertSessionHasErrors('username');
    }
}