<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('type'); // Type of the notice (e.g., 'announcement', 'event', etc.)
            $table->string('title'); // Title of the notice
            $table->text('description'); // Description of the notice
            $table->string('file')->nullable(); // Optional file associated with the notice (e.g., a document)
            $table->timestamps(); // Created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notices');
    }
}
