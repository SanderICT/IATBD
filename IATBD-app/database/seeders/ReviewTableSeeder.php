<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            'animal_id' => 1,
            'location' => 'Prinses Beatrixplein 16',
            'review' => "Melissa was super aardig en mijn kat is erg sceptisch met nieuwe mensen die hij ontmoet, maar toen ik hem kwam ophalen kon hij niet stoppen met haar koppen geven! Huis is netjes en ik garrandeer dat jouw huisdier net zo'n gewildige dag zal hebben als die van mij",
            'rating' => 5,
        ]);
    }
}
