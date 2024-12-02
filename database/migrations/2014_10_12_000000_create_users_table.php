<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('type'); // Assuming "type" is a string, such as user roles
            $table->string('name'); // String column for user name
            $table->string('email')->unique(); // Unique string column for email
            $table->string('contact_number'); // Use string for phone numbers to handle special formats
            $table->string('password'); // String column for password
            $table->rememberToken(); // Adds "remember_token" for authentication
            $table->timestamps(); // Adds "created_at" and "updated_at"
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
};
