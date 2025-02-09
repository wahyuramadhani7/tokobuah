<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'singndue@gmail.com'], // Jika sudah ada, update saja
            [
                'name' => 'Admin',
                'password' => bcrypt('wahyuganteng'),
                'is_admin' => 1, // Pastikan menggunakan angka 1
            ]
        );
    }
}

