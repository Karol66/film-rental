<?php

namespace Database\Seeders;

use App\Models\FilmType;
use App\Models\Types;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FilmType::create([
            'name' => 'Comedy',
        ]);
        FilmType::create([
            'name' => 'Drama',
        ]);
        FilmType::create([
            'name' => 'Adventure',
        ]);
        FilmType::create([
            'name' => 'Action',
        ]);
        FilmType::create([
            'name' => 'Horror',
        ]);
        FilmType::create([
            'name' => 'Thriller',
        ]);
    }
}
