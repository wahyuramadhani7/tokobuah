<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'wahyuadmin@gmail.com',
            'password' => Hash::make('singndue'),
            'role' => 'admin',
        ]);
    }
}
