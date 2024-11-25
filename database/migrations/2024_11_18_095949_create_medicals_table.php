<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('medicals', function (Blueprint $table) {
            $table->decimal('fee', 10, 2)->nullable(); // Fee column (decimal, nullable)
            $table->unsignedBigInteger('state_id')->nullable(); // State ID
            $table->unsignedBigInteger('course_id')->nullable(); // Course ID
            $table->string('quota')->nullable(); // Quota (string, nullable)
            $table->string('type')->nullable(); // Type (string, nullable)
            // Add foreign key constraints if applicable
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medicals', function (Blueprint $table) {
            // Drop columns
            $table->dropColumn(['fee', 'state_id', 'course_id', 'quota', 'type']);
            $table->dropForeign(['state_id']);
            $table->dropForeign(['course_id']);
        });
    }
};
