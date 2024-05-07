<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("grades")->insert([
            "course_code"=>"DSA",
            "user_id"=>1,
            "grade_score"=>90.0,
            
            
        ]
        );

        DB::table("grades")->insert([
            "course_code"=>"DB",
            "user_id"=>1,
            "grade_score"=>60.0,
            
            
        ]
        );


        DB::table("grades")->insert([
            "course_code"=>"kbs",
            "user_id"=>1,
            "grade_score"=>60.0,
            
            
        ]
        );
    }
}
