<?php

namespace Database\Seeders;

use App\Models\Order_payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order_payment::create([
            'order_id' => 1,
            'amount' => 1020.00,
            'payment_method' => 'Credit Card',
            'status' => 'completed'
        ]);
    }
}
