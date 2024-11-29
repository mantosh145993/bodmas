<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaidPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paid_packages', function (Blueprint $table) {
            $table->id(); // Unique identifier for each package
            $table->string('package_name'); // Name of the package
            $table->text('description')->nullable(); // Description of the package
            $table->decimal('base_price', 10, 2); // Base price before GST
            $table->decimal('gst_rate', 5, 2); // GST rate (e.g., 18.00 for 18%)

            // Computed columns
            $table->decimal('gst_amount', 10, 2)
                ->storedAs('base_price * gst_rate / 100'); // GST amount calculated
            $table->decimal('total_price', 10, 2)
                ->storedAs('base_price + (base_price * gst_rate / 100)'); // Total price (base price + GST)

            $table->string('image')->nullable(); // Image for the package
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paid_packages');
    }
}
