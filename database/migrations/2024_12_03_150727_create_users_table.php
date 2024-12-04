<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
