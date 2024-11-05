<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AnimalMediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('animals_media')->insert([
            'animal' => '1',
            'media' => '/media/Animals/Dog_Breeds.jpg'
        ]);
        DB::table('animals_media')->insert([
            'animal' => '2'
        ]);
        DB::table('animals_media')->insert([
            'animal' => '3'
        ]);
    }
}
