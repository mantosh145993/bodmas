<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('links', function (Blueprint $table) {
            $table->string('status')->default('active')->after('link'); // Add a status column with a default value
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('links', function (Blueprint $table) {
            $table->dropColumn('status'); // Remove the status column
        });
    }
}
