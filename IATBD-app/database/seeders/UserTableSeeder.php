<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            "firstname" => "Melissa",
            "lastname" => "Parker",
            "username" => "smileymelly",
            "email" => "smileymelly@gmail.com",
            "password" => bcrypt("smileymelly"),
            'media' => '/media/Users/Melissa.jpg',
        ]);
        DB::table('users')->insert([
            "firstname" => "Randy",
            "lastname" => "Reid",
            "username" => "Randeid",
            "email" => "randeid@gmail.com",
            "password" => bcrypt("rr420"),
            "role" => "admin",
        ]);
        DB::table('users')->insert([
            "firstname" => "Sander",
            "lastname" => "Haaksman",
            "username" => "SanderSan",
            "email" => "shaaksman@gmail.com",
            "password" => bcrypt("sander123"),
            "role" => "owner",
        ]);
    }
}
