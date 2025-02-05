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
            'name' => 'iPhone 14',
            'vendor_id' => 1,
            'category_id' => 1,
            'sub_category_id' => 1,
            'price' => 999.99,
            'stock' => 10
        ]);

        Product::create([
            'name' => 'MacBook Pro',
            'vendor_id' => 1,
            'category_id' => 1,
            'sub_category_id' => 2,
            'price' => 1999.99,
            'stock' => 5
        ]);

        Product::create([
            'name' => 'Men’s T-Shirt',
            'vendor_id' => 2,
            'category_id' => 2,
            'sub_category_id' => 3,
            'price' => 20.00,
            'stock' => 50
        ]);
    }
}
