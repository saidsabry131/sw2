<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->string('course_code');
            $table->float('grade_score', 5, 2)->default(null);

            // Define composite primary key
            

            // Define foreign key constraints
            $table->foreign('course_code')->references('course_code')->on('courses')
                ->onUpdate('cascade')->onDelete('cascade');

            

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
