<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;
use App\Models\User;

class EditPasswordTest extends TestCase
{
    // Trait refresh database agar migration dijalankan
    use RefreshDatabase;
    /** @test */

    public function apakah_user_dapat_edit_password()
    {
        $userTest = User::create([
            'namaakun' => 'johnDoe',
            'email' => 'john@example.com',
            'password' => bcrypt($password = 'i-love-laravel'),
            'password_confirmation' => bcrypt($password = 'i-love-laravel'),
            'jenisakun' => 0,
        ]);

        User::where('email' , $userTest -> email)
        ->where('namaakun', $userTest -> namaakun)
        ->update (['password' => bcrypt('laravel123')]);

        $this->assertTrue(app('hash')->check('laravel123', User::first()->password));
    }

}
