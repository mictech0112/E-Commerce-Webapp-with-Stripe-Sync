<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Product 1',
                'information' => 'Description for Product 1',
                'price' => 1000,
                'is_selling' => true,
                'is_soldout' => false,
                'shop_id' => 1,
                'secondary_category_id' => 1,
                'image1' => 1,
                'color' => 'Red',
            ],
            [
                'name' => 'Product 2',
                'information' => 'Description for Product 2',
                'price' => 1500,
                'is_selling' => true,
                'is_soldout' => false,
                'shop_id' => 1,
                'secondary_category_id' => 2,
                'image1' => 2,
                'color' => 'Blue',
            ],
            [
                'name' => 'Product 3',
                'information' => 'Description for Product 3',
                'price' => 1200,
                'is_selling' => true,
                'is_soldout' => false,
                'shop_id' => 1,
                'secondary_category_id' => 3,
                'image1' => 3,
                'color' => 'Green',
            ],
            [
                'name' => 'Product 4',
                'information' => 'Description for Product 4',
                'price' => 800,
                'is_selling' => true,
                'is_soldout' => false,
                'shop_id' => 1,
                'secondary_category_id' => 4,
                'image1' => 3,
                'color' => 'Yellow',
            ],
            [
                'name' => 'Product 5',
                'information' => 'Description for Product 5',
                'price' => 2000,
                'is_selling' => false,
                'is_soldout' => true,
                'shop_id' => 1,
                'secondary_category_id' => 5,
                'image1' => 4,
                'color' => 'Black',
            ],
        ]);
    }
}
