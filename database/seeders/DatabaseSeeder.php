<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'role' => 'admin',
                'email' => 'admin@gmail.com',
                'location' => 'Branch Office',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Head Office Manager',
                'role' => 'head',
                'email' => 'head@gmail.com',
                'location' => 'Head Office',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Branch Manager',
                'role' => 'branch',
                'email' => 'branch@gmail.com',
                'location' => 'Branch Office',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Driver',
                'role' => 'driver',
                'email' => 'driver@gmail.com',
                'location' => 'Branch Office',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('cars')->insert([
            [
                'id' => 1,
                'name' => 'Car 1',
                'category' => 'people',
                'status' => 'ready',
                'car_plat' => Str::random(6),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Car 2',
                'category' => 'goods',
                'status' => 'ready',
                'car_plat' => Str::random(6),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Car 3',
                'category' => 'goods',
                'status' => 'ready',
                'car_plat' => Str::random(6),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Car 4',
                'category' => 'people',
                'status' => 'ready',
                'car_plat' => Str::random(6),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
