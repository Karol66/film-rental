<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
            'user_name' => 'johndoe',
            'password' => bcrypt('password123'),
            'is_admin' => 1,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'janesmith@example.com',
            'user_name' => 'janesmith',
            'password' => bcrypt('password123'),
            'is_admin' => 1,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Robert',
            'last_name' => 'Johnson',
            'email' => 'robertjohnson@example.com',
            'user_name' => 'robertjohnson',
            'password' => bcrypt('password123'),
            'is_admin' => 0,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Emily',
            'last_name' => 'Davis',
            'email' => 'emilydavis@example.com',
            'user_name' => 'emilydavis',
            'password' => bcrypt('password123'),
            'is_admin' => 0,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Michael',
            'last_name' => 'Wilson',
            'email' => 'michaelwilson@example.com',
            'user_name' => 'michaelwilson',
            'password' => bcrypt('password123'),
            'is_admin' => 0,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
