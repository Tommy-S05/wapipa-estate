<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //Admin
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@wapipa.com',
                'password' => Hash::make('password'),
                //            'photo' => 'default.png',
                'phone' => '809-852-2693',
                'address' => 'Jl. Raya Jember No. 123',
                'role' => 'admin',
                'status' => 'active',
            ],

            //Agent
            [
                'name' => 'Agent',
                'username' => 'agent',
                'email' => 'agent@hotmail.com',
                'password' => Hash::make('password'),
                //            'photo' => 'default.png',
                'phone' => '809-915-7187',
                'address' => 'Jl. Raya Jember No. 123',
                'role' => 'agent',
                'status' => 'active',
            ],

            //User
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@hotmail.com',
                'password' => Hash::make('password'),
                //            'photo' => 'default.png',
                'phone' => '809-853-2904',
                'address' => 'Jl. Raya Jember No. 123',
                'role' => 'user',
                'status' => 'active',
            ]
        ]);
    }
}
