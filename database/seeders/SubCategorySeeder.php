<?php

namespace Database\Seeders;

use App\Models\Sub_category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sub_category::create([
                'name' => 'Mobile Phones',
                'category_id' => 1,
                'description'=>'des',
                'logo' => 'logo.png',
                'status' => "ACTIVE"
            ]);
        Sub_category::create(['name' => 'Laptops', 'category_id' => 1,    'description'=>'des',
                'logo' => 'logo.png',
                'status' => "ACTIVE"]);
        Sub_category::create(['name' => 'Men’s Clothing', 'category_id' => 2,    'description'=>'des',
                'logo' => 'logo.png',
                'status' => "ACTIVE"]);
        Sub_category::create(['name' => 'Women’s Clothing', 'category_id' => 2,    'description'=>'des',
                'logo' => 'logo.png',
                'status' => "ACTIVE"]);
    }
}
