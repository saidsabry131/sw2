<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class departmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("departments")->insert(
       
        [
            "depart_code"=>"it",
            "depart_name"=>"information technology"
        ],
        );

        DB::table("departments")->insert(
       
            [
                "depart_code"=>"is",
                "depart_name"=>"information system"
            ],
            );


            DB::table("departments")->insert(
       
                [
                    "depart_code"=>"cs",
                    "depart_name"=>"computer science"
                ],
                );
    }
}
