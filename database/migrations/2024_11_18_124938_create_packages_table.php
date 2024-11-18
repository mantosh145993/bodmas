<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('product_name'); // Name of the product/package
            $table->string('images'); // Store the image URLs (could be file paths or URLs)
            $table->text('description'); // Description of the product/package
            $table->decimal('sale_price', 10, 2); // Sale price of the package
            $table->decimal('ragular_price', 10, 2); // Regular price of the package
            $table->string('category'); // Category of the package (e.g., electronics, clothing, etc.)
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
        Schema::dropIfExists('packages');
    }
}

