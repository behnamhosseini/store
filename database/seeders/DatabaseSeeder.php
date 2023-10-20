<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'balance' => 50000,
            'phone' => '09100000000'
        ]);
        DB::table('products')->insert([
            'id' => 1,
            'price' => 10000,
            'quantity' => 10,
        ]);
    }
}
