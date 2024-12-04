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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id(); // Auto-incrementing BIGINT(20) primary key
            $table->tinyInteger('rating')->unsigned()->checkBetween(1, 5); // Tiny integer for rating (1-5)
            $table->string('subject', 255); // Subject field with a max length of 255
            $table->text('feedback'); // Feedback content
            $table->timestamps(); // Adds 'created_at' and 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
};
