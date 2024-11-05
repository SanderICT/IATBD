<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class LocationMediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('location_media')->insert([
            'location' => 'Prinses Beatrixplein 16',
            'media' => '/media/Locations/672_720x480.jpg'
        ]);
        DB::table('location_media')->insert([
            'location' => 'Prinses Beatrixplein 16',
            'media' => '/media/Locations/673_360x240.jpg'
        ]);
        DB::table('location_media')->insert([
            'location' => 'Prinses Beatrixplein 16',
            'media' => '/media/Locations/675_360x240.jpg'
        ]);
        DB::table('location_media')->insert([
            'location' => 'Prinses Beatrixplein 16',
            'media' => '/media/Locations/676_360x240.jpg'
        ]);

        DB::table('location_media')->insert([
            'location' => 'Bloemerstraat 94'
        ]);
    }
}
