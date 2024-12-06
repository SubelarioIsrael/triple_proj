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
        if (!Schema::hasTable('exercises')) {
            Schema::create('exercises', function (Blueprint $table) {
                $table->id(); // Primary key
                $table->string('name')->unique(); // Unique name of the exercise
                $table->integer('inhale_time'); // Time in seconds for inhaling
                $table->integer('hold_time'); // Time in seconds for holding the breath
                $table->integer('exhale_time'); // Time in seconds for exhaling
                $table->text('instructions'); // Detailed instructions for the exercise
                $table->timestamps(); // Created at and updated at timestamps
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
        Schema::dropIfExists('exercises');
    }
};
