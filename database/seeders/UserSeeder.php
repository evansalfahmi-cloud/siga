<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'tendik123',
                'password' => Hash::make('password123'),
                'role' => 'tendik',
            ],
            [
                'username' => 'siswa123',
                'password' => Hash::make('password123'),
                'role' => 'siswa',
            ],
        ]);
    }
}
