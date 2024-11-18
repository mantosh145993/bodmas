<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankCutoffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rank_cutoffs', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('college_id')->constrained()->onDelete('cascade'); // Foreign key to `colleges` table
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Foreign key to `categories` table
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // Foreign key to `courses` table
            $table->integer('rank_cutoff'); // Rank cutoff for the specific college/course/category
            $table->integer('round'); // The round number for the rank cutoff
            $table->year('year'); // The year for the rank cutoff
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rank_cutoffs');
    }
}

