<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // State name
            $table->timestamps(); // Created at and Updated at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('states');
    }
}

