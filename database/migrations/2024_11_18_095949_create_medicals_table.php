<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('medicals', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('college_id')->index(); // College ID
            $table->string('college_name'); // College Name
            $table->string('course'); // Course name
            $table->string('category'); // Category (e.g., General, OBC)
            $table->integer('rank'); // Rank
            $table->string('round'); // Round (e.g., Round 1, Round 2)
            $table->timestamps(); // Created_at and Updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_colleges');
    }
};
