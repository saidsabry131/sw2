<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Database\Seeders\userSeeder;
use Illuminate\Foundation\Auth\User;
use Database\Seeders\departmentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // //Define departments to seed
        // $depart = [
        //     [
        //         "depart_name" => "Computer Science",
        //         "depart_code" => "cs",
        //     ],
        //     [
        //         "depart_name" => "Information System",
        //         "depart_code" => "is",
        //     ],
        //     [
        //         "depart_name" => "Information Technology",
        //         "depart_code" => "it",
        //     ]
        // ];

        // // Seed each department into the database
        // foreach ($depart as $department) {
        //     Departments::create($department);
        // }

        // // Optionally, print a success message
        // $this->command->info("Seeded 3 departments successfully.");





        // \App\Models\User::factory(10)->create();

    //     $users = [
    //         [
    //             'name' => 'Said Sabry',
    //             'email' => 'saidsabry@example.com',
    //             'password' => bcrypt('12345678'),
    //             'user_type' => 'admin',
    //             'phone' => '123-456-7890',
    //             'address' => '123 Main St',
    //             'depart_code' => 'cs', // Add depart_code as 'cs' for Computer Science
    //         ],
    //         [
    //             'name' => 'Mohamed Yasser Adsel',
    //             'email' => 'mohamed@example.com',
    //             'password' => bcrypt('12345678'),
    //             'user_type' => 'student',
    //             'phone' => '321-654-0987',
    //             'address' => '456 Elm St',
    //             'depart_code' => 'is', // Add depart_code as 'is' for Information System
    //         ],
    //         [
    //             'name' => 'Bob Johnson',
    //             'email' => 'bobjohnson@example.com',
    //             'password' => bcrypt('12345678'),
    //             'user_type' => 'student',
    //             'phone' => '987-654-3210',
    //             'address' => '789 Maple Ave',
    //             'depart_code' => 'it', // Add depart_code as 'it' for Information Technology
    //         ],
    //         [
    //             'name' => 'Alice White',
    //             'email' => 'alicewhite@example.com',
    //             'password' => bcrypt('12345678'),
    //             'user_type' => 'student',
    //             'phone' => '555-555-5555',
    //             'address' => '159 Oak Dr',
    //             'depart_code' => 'cs', // Add depart_code as 'cs' for Computer Science
    //         ],
    //         [
    //             'name' => 'Chris Green',
    //             'email' => 'chrisgreen@example.com',
    //             'password' => bcrypt('12345678'),
    //             'user_type' => 'doctor',
    //             'phone' => '555-123-4567',
    //             'address' => '753 Pine St',
    //             'depart_code' => 'is', // Add depart_code as 'is' for Information System
    //         ],
    //     ];

    //     // Create each user record in the database
    //     foreach ($users as $user) {
    //         User::create($user);
    //         $this->command->info("Created user: {$user['name']} with depart_code: {$user['depart_code']}");
    //     }

    //     // Optionally, print a success message
    //     $this->command->info("Seeded 5 users successfully with their respective department codes.");
    // }


        $this->call(
            [
                userSeeder::class
            ]
            );
    }
}



        
