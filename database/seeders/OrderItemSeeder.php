<?php

namespace Database\Seeders;

use App\Models\Order_item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order_item::create([
            'order_id' => 1,
            'product_id' => 1,
            'quantity' => 1,
            'price' => 999.99
        ]);

        Order_item::create([
            'order_id' => 1,
            'product_id' => 3,
            'quantity' => 1,
            'price' => 20.00
        ]);
    }
}
