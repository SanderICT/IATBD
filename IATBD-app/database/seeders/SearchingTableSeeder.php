<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SearchingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('searching')->insert([
            'owner' => 1,
            'for' => 1,
            'from' => '2022-05-15 12:50:00',
            'to' => '2022-05-17 21:00:00',
            'payment' => 20.00
        ]);
        DB::table('searching')->insert([
            'owner' => 2,
            'for' => 2,
            'from' => '2022-08-20 14:45:00',
            'to' => '2022-08-31 00:00:00',
            'payment' => 5.00
        ]);
        DB::table('searching')->insert([
            'owner' => 2,
            'for' => 3,
            'from' => '2022-08-20 14:45:00',
            'to' => '2022-08-31 00:00:00',
            'payment' => 50.00
        ]);
    }
}
