<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LocationMediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Locaties en hun media
        $locations = [
            'Prinses Beatrixplein 16' => [
                '/media/Locations/home1.jpg',
                '/media/Locations/home1.jpg',
                '/media/Locations/home1.jpg',
                '/media/Locations/home1.jpg',
            ],
            'Bloemerstraat 94' => [
                '/media/Locations/home1.jpg', 
                '/media/Locations/home1.jpg',
            ],
        ];

        // Loop door de locaties en voeg media toe
        foreach ($locations as $address => $mediaFiles) {
            foreach ($mediaFiles as $mediaFile) {
                DB::table('location_media')->insert([
                    'location' => $address,
                    'media' => $mediaFile,
                ]);
            }
        }
    }
}

