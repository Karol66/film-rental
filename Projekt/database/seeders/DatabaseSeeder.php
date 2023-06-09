<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\FilmsTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\AdressesTableSeeder;
use Database\Seeders\FilmTypeTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([FilmTypeTableSeeder::class, FilmsTableSeeder::class, UsersTableSeeder::class, AdressesTableSeeder::class, TransactionTableSeeder::class]);
    }
}
