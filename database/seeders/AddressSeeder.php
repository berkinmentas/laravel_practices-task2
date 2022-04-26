<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('address')->insert([
            'title' => Str::random(10),
            'address' => Str::random(10),
            'district' => Str::random(10),
            'city' => Str::random(10),
            'postal_code' => Str::random(10),
            'user_id' => rand(1,10),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
