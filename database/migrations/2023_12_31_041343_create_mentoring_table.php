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
        Schema::create('mentoring', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable()->references('id')->on('student')->onUpdate('cascade')->onDelete('cascade');
            $table->text('question');
            $table->string('question_file_path')->nullable();
            $table->date('question_date');
            $table->text('answer')->nullable();
            $table->string('answer_file_path')->nullable();
            $table->date('answer_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentoring');
    }
};
