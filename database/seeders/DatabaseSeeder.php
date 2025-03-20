<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * php artisan migrate:fresh --seed でダミーデータを生成
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            ShopSeeder::class,
            ImageSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            StockSeeder::class
        ]);
    }
}
