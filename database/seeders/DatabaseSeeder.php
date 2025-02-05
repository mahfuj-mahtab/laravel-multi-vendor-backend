<?php


use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\CategorySeeder;
use Database\Seeders\OrderItemSeeder;
use Database\Seeders\OrderPaymentSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\SubCategorySeeder;
use Database\Seeders\VendorSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            // UserSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            VendorSeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
            OrderItemSeeder::class,
            OrderPaymentSeeder::class,
        ]);
    }
}
