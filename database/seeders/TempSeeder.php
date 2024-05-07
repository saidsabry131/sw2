<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TempSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("temp_table")->insert([
            "course_code"=>"kbs",
            "user_id"=>1,
            
            
            
        ]
        );

        DB::table("temp_table")->insert([
            "course_code"=>"DSA",
            "user_id"=>1,
            
            
            
        ]
        );
    }
}
