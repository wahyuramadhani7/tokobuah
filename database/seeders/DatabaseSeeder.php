<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Memanggil AdminUserSeeder untuk memastikan admin pertama dibuat
        $this->call(AdminUserSeeder::class);

        // Anda dapat menambahkan seeder lainnya di sini jika perlu, misalnya:
        // $this->call(OtherSeeder::class);
    }
}
