<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('title'); // Title of the banner
            $table->text('description')->nullable(); // Description (optional)
            $table->string('image'); // Path to the image
            $table->string('link')->nullable(); // Link to redirect when clicked (optional)
            $table->boolean('is_active')->default(1); // Active status (default is active)
            $table->integer('order_index')->default(0); // Order index for sorting
            $table->foreignId('page_id')->constrained()->onDelete('cascade'); // Foreign key to relate to pages
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
