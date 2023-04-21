<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            //Admin 
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin12345'),
                'remember_token' => Str::random(10),

            ],
              //Manager 
            [
                'name' => 'Manager',
                'username' => 'manager',
                'email' => 'manager@gmail.com',
                'password' => Hash::make('manager12345'),
                'remember_token' => Str::random(10),

            ],
              //User OR Customer  
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('user12345'),
                'remember_token' => Str::random(10),

            ],

        ]);
    }
}
