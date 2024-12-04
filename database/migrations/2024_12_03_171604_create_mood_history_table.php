<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mood_history', function (Blueprint $table) {
            $table->id(); // Primary key (BIGINT UNSIGNED AUTO_INCREMENT)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->foreignId('question_id')->constrained('mt_questions')->onDelete('cascade'); // Foreign key to mt_questions table
            $table->integer('score'); // Score for the question
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mood_history');
    }
};
