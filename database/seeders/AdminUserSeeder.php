<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Membuat atau memperbarui user dengan email 'singndue@gmail.com'
        User::updateOrCreate(
            ['email' => 'singndue@gmail.com'], // Jika sudah ada, update saja
            [
                'name' => 'Admin', // Nama user
                'email' => 'singndue@gmail.com', // Email user
                'password' => bcrypt('wahyuganteng'), // Password yang telah di-hash
                'is_admin' => 1, // Menetapkan user ini sebagai admin (1 berarti admin)
            ]
        );
    }
}


