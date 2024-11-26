<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();  // Auto-incrementing ID (equivalent to `int(11) NOT NULL AUTO_INCREMENT`)
            $table->string('name', 100);  // `name` varchar(100) NOT NULL
            $table->string('capital', 100)->nullable();  // `capital` varchar(100) DEFAULT NULL
            $table->bigInteger('population')->nullable();  // `population` bigint(20) DEFAULT NULL
            $table->string('region', 50)->nullable();  // `region` varchar(50) DEFAULT NULL
            $table->primary('id');  // Define the `id` as primary key (this is optional since Laravel uses `id` by default)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}
