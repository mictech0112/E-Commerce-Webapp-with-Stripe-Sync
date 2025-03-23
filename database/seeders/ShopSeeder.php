<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shops')->insert([
            [
                'name' => 'サウナイキタイオンラインストア',
                'information' => 'サウナってこんな楽しみ方もあるよ。こういうところに着目すると面白いよ。こんな施設があったよ。など、いろんな人のサウナ好き！な気持ちが集まって、皆のサウナライフがちょっぴり豊かに広がるようなサイトを目指しています。',
                'filename' => 'sample1.jpg',
                'is_selling' => true,
                'is_soldout' => false  
            ],
            ]);
    }
}
