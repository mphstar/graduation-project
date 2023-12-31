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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->foreignId('major_id')->nullable()->references('id')->on('major')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('gender', ["male", "female"])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('teacher_id')->nullable()->references('id')->on('teacher')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
