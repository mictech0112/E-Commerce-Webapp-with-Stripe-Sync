<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ImageSeeder extends Seeder
{
    /**
     * 画像のダミーデータを扱う場合はphp artisan storage:link でリンク作成しpublic/images内の画像ファイルをstorage/app/public内にshopsフォルダと productsフォルダを作成し
     * それぞれに画像をコピーして使用する。
     */
    public function run(): void
    {
        DB::table('images')->insert([
            [
                'filename' => 'sample1.jpg',
                'title' => null 
            ],
            [
                'filename' => 'sample2.jpg',
                'title' => null   
            ],
            [
                'filename' => 'sample3.jpg',
                'title' => null   
            ],
            [
                'filename' => 'sample4.jpg',
                'title' => null   
            ],
            [
                'filename' => 'sample5.jpg',
                'title' => null   
            ],
            [
                'filename' => 'sample6.jpg',
                'title' => null   
            ],
            ]);
    }
}
