<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('primary_categories')->insert([
            [
                'name' => '帽子',
                'sort_order' => 1,
            ],
            [
                'name' => 'パーカー・スウェット',
                'sort_order' => 2,
            ],
            [
                'name' => '雑貨',
                'sort_order' => 3,
            ],
            ]);

        DB::table('secondary_categories')->insert([
            [
                'name' => 'サウナキャップ',
                'sort_order' => 1,
                'primary_category_id' => 1
            ],
            [
                'name' => 'ニットキャップ',
                'sort_order' => 2,
                'primary_category_id' => 1
            ],
            [
                'name' => 'サンバイザー',
                'sort_order' => 3,
                'primary_category_id' => 1
            ],
            [
                'name' => 'フーディー',
                'sort_order' => 4,
                'primary_category_id' => 2
            ],
            [
                'name' => 'スウェットシャツ',
                'sort_order' => 5,
                'primary_category_id' => 2
            ],
            [
                'name' => 'でかロゴパーカー',
                'sort_order' => 6,
                'primary_category_id' => 2
            ],
            [
                'name' => 'キーホルダー',
                'sort_order' => 7,
                'primary_category_id' => 3
            ],
            [
                'name' => 'タオル',
                'sort_order' => 8,
                'primary_category_id' => 3
            ],
            [
                'name' => 'サウナバッグ',
                'sort_order' => 9,
                'primary_category_id' => 3
            ],
            ]);
    }
}
