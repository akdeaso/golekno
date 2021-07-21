<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('akun')->insert([
            [
                'namaakun' => 'Admin Golekno',
                'email' => 'admin@golekno.com',
                'password' => Hash::make('rbplanilaia'),
                'jenisakun' => 1,
            ],
            [
                'namaakun' => 'User',
                'email' => 'user@user.com',
                'password' => Hash::make('secret'),
                'jenisakun' => 0,
            ]
        ]);
    }
}
