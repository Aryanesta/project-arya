<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'product_category_id' => 1,
            'name' => 'Product 1',
            'price' => 10.99,
            'image' => 'product-1.png',
            'description' => 'This is product 1',
        ]);

        Product::create([
            'product_category_id' => 2,
            'name' => 'Product 2',
            'price' => 10.99,
            'image' => 'product-2.png',
            'description' => 'This is product 2',
        ]);
    }
}
