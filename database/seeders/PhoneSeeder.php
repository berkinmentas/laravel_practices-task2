<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phone')->insert([
            'phone_type' => Str::random(10),
            'phone_number' => Str::random(15),
            'user_id' => rand(1,10),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
