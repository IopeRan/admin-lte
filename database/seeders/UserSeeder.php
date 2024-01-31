<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as FakerFactory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        foreach (range(1, 30) as $index) {
            DB::table('users')->insert([
                'username' => $faker->Unique()->userName, 
                'fullname' => $faker->name,
                'password' => Hash::make('123'),  
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
