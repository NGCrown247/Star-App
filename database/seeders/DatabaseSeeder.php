<?php

namespace Database\Seeders;

use App\Models\User;
use App\Utils\Constants;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'full_name' => 'Admin User',
            'email' => 'admin@app.com',
            'role'=>Constants::ADMIN,
            'phone_number'=>"0804949595",
            'address'=>'address',
            "access_code"=>"101",
            "status"=>Constants::ACTIVE,
            "password"=>Hash::make("password")

        ]);


   
        $this->call([
            UserSeeder::class
        ]);





    }






}
