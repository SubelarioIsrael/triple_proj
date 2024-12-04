<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitialMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id(); // Primary key (auto-increment)
                $table->string('username')->unique(); // Username (unique)
                $table->string('email')->unique(); // Email (unique)
                $table->string('contact_number');
                $table->string('type');
                $table->string('password'); // Password
                $table->timestamp('email_verified_at')->nullable(); // Email verification timestamp
                $table->timestamps(); // created_at and updated_at
            });
        }

        if (!Schema::hasTable('mt_questions')) {
            Schema::create('mt_questions', function (Blueprint $table) {
                $table->id(); // Primary key (BIGINT UNSIGNED AUTO_INCREMENT)
                $table->string('q_item', 255); // Question text
                $table->timestamps(); // created_at and updated_at
            });
        }

        if (!Schema::hasTable('mood_history')) {
            Schema::create('mood_history', function (Blueprint $table) {
                $table->id(); // Primary key (BIGINT UNSIGNED AUTO_INCREMENT)
                $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
                $table->foreignId('question_id')->constrained('mt_questions')->onDelete('cascade'); // Foreign key to mt_questions table
                $table->integer('score'); // Score for the question
                $table->timestamps(); // created_at and updated_at
            });
        }

        if (!Schema::hasTable('notifications')) {
            Schema::create('notifications', function (Blueprint $table) {
                $table->id(); // Primary key
                $table->string('title'); // Title of the notification
                $table->text('description'); // Description of the notification
                $table->timestamp('end_time'); // End time of the notification
                $table->foreignId('added_by_user_id')->constrained('users'); // Foreign key referencing users table
                $table->timestamps(); // Created at and updated at timestamps
            });
        }

        if (!Schema::hasTable('feedback_hist')) {
            Schema::create('feedback_hist', function (Blueprint $table) {
                $table->id();  // Primary key
                $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Reference to the user who submitted the feedback
                $table->integer('rating');  // Rating from 1 to 5
                $table->string('subject');  // Subject (e.g., Bug, Suggestion, etc.)
                $table->text('feedback');  // The actual feedback text
                $table->timestamps();  // Created and updated timestamps
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('mt_questions');
        Schema::dropIfExists('mood_history');
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('feedback_hist');
    }
}
