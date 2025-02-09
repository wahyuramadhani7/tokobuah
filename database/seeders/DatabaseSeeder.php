<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Pastikan AdminUserSeeder dipanggil di sini
        $this->call(AdminUserSeeder::class);
    }
}
