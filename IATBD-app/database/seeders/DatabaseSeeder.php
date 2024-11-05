<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserTableSeeder::class,
            AnimalSpeciesTableSeeder::class,
            AnimalTableSeeder::class,
            LocationTableSeeder::class,
            LocationMediaTableSeeder::class,
            AnimalMediaTableSeeder::class,
            LocationAvailabilityTableSeeder::class,
            SearchingTableSeeder::class,
            ReviewTableSeeder::class,
        ]);
    }
}
