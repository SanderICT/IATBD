<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class LocationAvailabilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('location_availability')->insert([
            'location' => 'Prinses Beatrixplein 16',
            'for' => 'Dog'
        ]);
        DB::table('location_availability')->insert([
            'location' => 'Prinses Beatrixplein 16',
            'for' => 'Cat'
        ]);
    }
}
