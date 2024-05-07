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
        Schema::create('tempp_table', function (Blueprint $table) {
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('course_code');

            // Add foreign key constraints
            $table->foreign('course_code')
                ->references('course_code')
                ->on('courses')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // Define a composite primary key using user_id and course_code
            $table->primary(['user_id', 'course_code']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempp_table');
    }
};
