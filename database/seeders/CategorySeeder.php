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
                'name' => 'サ業帽',
                'sort_order' => 1,
                'primary_category_id' => 1
            ],
            [
                'name' => 'めちゃめちゃワッチキャップ',
                'sort_order' => 2,
                'primary_category_id' => 1
            ],
            [
                'name' => 'WAVEキャップ',
                'sort_order' => 3,
                'primary_category_id' => 1
            ],
            [
                'name' => 'ツメタイを添えてパーカー',
                'sort_order' => 4,
                'primary_category_id' => 2
            ],
            [
                'name' => 'サ飯パーカー生姜焼き',
                'sort_order' => 5,
                'primary_category_id' => 2
            ],
            [
                'name' => 'でかロゴパーカー',
                'sort_order' => 6,
                'primary_category_id' => 2
            ],
            [
                'name' => 'サウナイキタイキーホルダー',
                'sort_order' => 7,
                'primary_category_id' => 3
            ],
            [
                'name' => 'ロウリュしてもいいですかキーホルダー',
                'sort_order' => 8,
                'primary_category_id' => 3
            ],
            [
                'name' => '熱波うけるくん手ぬぐい',
                'sort_order' => 9,
                'primary_category_id' => 3
            ],
            ]);
    }
}
