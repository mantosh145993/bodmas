<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatbotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatbots', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->text('question'); // Field to store the question
            $table->text('reply'); // Field to store the reply
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
        Schema::dropIfExists('chatbots');
    }
}
