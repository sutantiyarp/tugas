<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase; // Untuk memastikan database di-reset setiap kali pengujian dijalankan

    /**
     * Test login dengan data valid.
     *
     * @return void
     */
    public function test_login_with_valid_credentials()
    {
        // Simulasikan data pengguna yang sudah terdaftar
        $user = User::create([
            'nama_user' => 'John Doe',
            'username' => 'john_doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Simulasikan permintaan login dengan kredensial yang benar
        $response = $this->post('/login', [
            'email' => 'johndoe@example.com',
            'password' => 'password123',
        ]);

        // Verifikasi bahwa pengguna berhasil login dan diarahkan ke dashboard
        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($user); // Pastikan pengguna sudah login
    }

    /**
     * Test login dengan kredensial yang salah.
     *
     * @return void
     */
    public function test_login_with_invalid_credentials()
    {
        // Simulasikan permintaan login dengan kredensial yang salah
        $response = $this->post('/login', [
            'email' => 'nonexistent@example.com', // Email yang tidak ada
            'password' => 'wrongpassword', // Password yang salah
        ]);

        // Verifikasi bahwa login gagal dan kembali ke halaman login dengan pesan error
        $response->assertSessionHasErrors('email');
        $response->assertRedirect(route('login')); // Pastikan pengguna tetap di halaman login
    }

    /**
     * Test login dengan email kosong.
     *
     * @return void
     */
    public function test_login_with_empty_email()
    {
        // Simulasikan permintaan login dengan email kosong
        $response = $this->post('/login', [
            'email' => '',
            'password' => 'password123',
        ]);

        // Verifikasi bahwa validasi email gagal
        $response->assertSessionHasErrors('email');
    }

    /**
     * Test login dengan password kosong.
     *
     * @return void
     */
    public function test_login_with_empty_password()
    {
        // Simulasikan permintaan login dengan password kosong
        $response = $this->post('/login', [
            'email' => 'johndoe@example.com',
            'password' => '',
        ]);

        // Verifikasi bahwa validasi password gagal
        $response->assertSessionHasErrors('password');
    }
}