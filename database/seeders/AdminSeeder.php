<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'name' => 'seedertest',
            'email' => 'seedertest@test.com',
            'password' => Hash::make('password123'),
            'created_at' => '2021/01/01 11:11:11'
        ]);
    }
}
