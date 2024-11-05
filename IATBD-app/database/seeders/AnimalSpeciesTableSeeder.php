<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AnimalSpeciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kind_of_animals_array = ["Dog", "Cat", "Fish", "Bird", "Reptile", "Rabbit", "Hamster", "Guinea Pig"];

        foreach($kind_of_animals_array as $kind){
            DB::table('animal_species')->insert([
                'kind' => $kind
            ]);
        }
    }
}
