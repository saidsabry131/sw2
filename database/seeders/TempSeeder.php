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
        DB::table("tempp_table")->insert([
            "course_code"=>"OS",
            "user_id"=>1,
            
            
            
        ]
        );

        DB::table("tempp_table")->insert([
            "course_code"=>"DB",
            "user_id"=>1,
            
            
            
        ]
        
        );


        // DB::table("tempp_table")->insert([
        //     "course_code"=>"DB",
        //     "user_id"=>1,
            
            
            
        // ]
        
        // );
    }
}
