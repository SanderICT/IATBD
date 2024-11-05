<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('location')->insert([
            'address' => 'Prinses Beatrixplein 16',
            'city' => 'Haarlem',
            'owner' => 1,
        ]);
        DB::table('location')->insert([
            'address' => 'Bloemerstraat 94',
            'city' => 'Nijmwege',
            'owner' => 2,
        ]);
    }
}
