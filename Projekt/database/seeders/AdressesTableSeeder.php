<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AdressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('adresses')->insert([
            [
                'street' => $faker->streetName,
                'home_number' => 123,
                'apartment_number' => 'A1',
                'city' => $faker->city,
                'id_user' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'street' => $faker->streetName,
                'home_number' => 456,
                'apartment_number' => 'B2',
                'city' => $faker->city,
                'id_user' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'street' => $faker->streetName,
                'home_number' => 789,
                'apartment_number' => 'C3',
                'city' => $faker->city,
                'id_user' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'street' => $faker->streetName,
                'home_number' => 987,
                'apartment_number' => 'D4',
                'city' => $faker->city,
                'id_user' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'street' => $faker->streetName,
                'home_number' => 654,
                'apartment_number' => 'E5',
                'city' => $faker->city,
                'id_user' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
