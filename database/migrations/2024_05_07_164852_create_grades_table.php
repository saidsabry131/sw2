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
            $table->string('course_code'); // Added index for course_code
            $table->float('grade_score', 5, 2)->default(null);
            
            // Foreign key on course_code referencing courses(course_code)
            $table->foreign('course_code')->references('course_code')->on('courses') // Optional: Specify action on update
            ;
            // Foreign key on user_id referencing users(id)
            $table->foreignId('user_id')->references('id')->on('users');
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
