<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Vendor::create([
        'name' => 'Tech Store', 
        'user_id' => 2,
        'description'=>"DES",
        'logo'=>'logo.png',
        'contact_info'=>'dd',
     
    
    ]); 
        // Vendor::create(['name' => 'Fashion Hub', 'user_id' => 3]);
    }
}
