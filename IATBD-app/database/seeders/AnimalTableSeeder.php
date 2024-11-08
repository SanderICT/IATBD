<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('animal')->insert([
            "name" => "Henry",
            "age" => 5,
            "kind" => "hond",
            "payment" => 10,
            "durationInHours" => 2,
            "owner" => 1,
            "note" => "Moet medicijnen innemen met avond eten (rond 18.30 - 19.30)"
        ]);
        DB::table('animal')->insert([
            "name" => "Blub",
            "age" => 2,
            "kind" => "vis",
            "payment" => 12.50,
            "durationInHours" => 1,
            "owner" => 2,
            "note" => ""
        ]);
        DB::table('animal')->insert([
            "name" => "Boris",
            "age" => 3,
            "kind" => "kat",
            "payment" => 5,
            "durationInHours" => 4,
            "owner" => 2,
            "note" => "Kijkt soms iets te veel naar Blub...."
        ]);
    }
}
