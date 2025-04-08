<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            User::create([
                'full_name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'phone_number' => fake()->phoneNumber(),
                'address'=> fake()->address(),
                'access_code' => rand(1, 1000000),
                'status' => fake()->randomElement(['active', 'inactive']),
                'role' => 'user',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
