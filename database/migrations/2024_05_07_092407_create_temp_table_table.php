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
        Schema::create('temp_table', function (Blueprint $table) {
            //$table->bigInteger('user_id')->index(); // Added index for user_id
            $table->string('course_code')->index()->primary(); // Added index for course_code
            
            
            // Foreign key on course_code referencing courses(course_code)
            $table->foreign('course_code')
                  ->references('course_code')
                  ->on('courses')
                  ->onDelete('cascade') // Optional: Specify action on delete
                  ->onUpdate('cascade'); // Optional: Specify action on update
            
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
        Schema::dropIfExists('temp_table');
    }
};
