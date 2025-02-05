<?php


namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = ['Electronics', 'Fashion', 'Home & Kitchen', 'Books', 'Beauty & Personal Care'];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'description'=>'des',
                'logo' => 'logo.png',
                'status' => "ACTIVE"
            ]);
        }
    }
}
