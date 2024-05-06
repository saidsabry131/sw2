<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Alice',
                'email' => 'alice@example.com',
                'phone' => '1234567890',
                'address' => '123 Main St',
                'email_verified_at' => now(),
                'password' => bcrypt('password'), // Use bcrypt to hash passwords
                'user_type' => 'student',
                'user_depart' => 'cs',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Bob',
                'email' => 'bob@example.com',
                'phone' => '2345678901',
                'address' => '456 Elm St',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'user_type' => 'doctor',
                'user_depart' => 'is',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Carol',
                'email' => 'carol@example.com',
                'phone' => '3456789012',
                'address' => '789 Pine St',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'user_type' => 'admin',
                'user_depart' => 'it',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'David',
                'email' => 'david@example.com',
                'phone' => '4567890123',
                'address' => '101 Oak St',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'user_type' => 'student',
                'user_depart' => 'cs',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Eve',
                'email' => 'eve@example.com',
                'phone' => '5678901234',
                'address' => '111 Maple St',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'user_type' => 'doctor',
                'user_depart' => 'is',
                'remember_token' => Str::random(10),
            ],
        ]);

    }
}
