<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Apel Fuji',
            'description' => 'Apel segar dari Jepang',
            'price' => 25000,
            'stock' => 50,
            'image' => 'apel.jpg'
        ]);
    }
}

