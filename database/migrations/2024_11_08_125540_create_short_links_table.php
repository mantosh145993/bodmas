<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShortLinksTable extends Migration
{
    public function up()
    {
        Schema::create('short_links', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();      // Short code for the URL
            $table->text('url');                   // Original URL
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('short_links');
    }
}
