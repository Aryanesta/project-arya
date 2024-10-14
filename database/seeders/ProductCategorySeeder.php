<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::create([
            'category_name' => 'Minuman',
            'description' => 'Buat diminum'
        ]);
        ProductCategory::create([
            'category_name' => 'Makanan',
            'description' => 'Buat dimakan'
        ]);
    }
}
