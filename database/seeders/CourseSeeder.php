<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("courses")->insert(
            [
            "course_code"=>"kbs",
            "course_name"=>"knowaladge base system",
            "course_desc"=>"AI",
            "course_depart"=>"it",
            
        ]
        );

        DB::table("courses")->insert([
            "course_code"=>"DSA",
            "course_name"=>"data structure ",
            "course_desc"=>"data structure and algorithm",
            "course_depart"=>"cs",
            
        ]
        );

        DB::table("courses")->insert([
            "course_code"=>"DB",
            "course_name"=>"database",
            "course_desc"=>"AI",
            "course_depart"=>"is",
            
        ]
        );

        DB::table("courses")->insert([
            "course_code"=>"OS",
            "course_name"=>"operating system",
            "course_desc"=>"liunx",
            "course_depart"=>"cs",
            
        ]
        );
    }
}
