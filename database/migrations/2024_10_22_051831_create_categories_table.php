<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing ID
            $table->string('name'); // Category name
            $table->text('description')->nullable(); // Optional description
            $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('cascade'); // Parent category
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
