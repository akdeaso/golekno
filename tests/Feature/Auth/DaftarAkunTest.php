<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;
use App\Models\User;

class DaftarAkunTest extends TestCase
{
    // Trait refresh database agar migration dijalankan
    use RefreshDatabase;
    /** @test */
    public function apakah_user_dapat_mendaftar_akun()
    {
        $userTest = User::create([
            'namaakun' => 'johnDoe',
            'email' => 'john@example.com',
            'password' => bcrypt($password = 'i-love-laravel'),
            'password_confirmation' => bcrypt($password = 'i-love-laravel'),
            'jenisakun' => 0,
        ]);

        $loginResponse = $this->post('/dashboard/login', [
            'email' => $userTest->email,
            'password' => $password,
        ]);

        $this->assertTrue(app('hash')->check('i-love-laravel', User::first()->password));
    }
}
