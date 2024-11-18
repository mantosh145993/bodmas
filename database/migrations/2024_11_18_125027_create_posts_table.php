<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Post title
            $table->string('slug')->unique(); // Slug for SEO-friendly URL
            $table->text('content'); // Main content of the post
            $table->text('excerpt')->nullable(); // Short summary or excerpt of the post
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to the users table (assumes `users` table exists)
            $table->foreignId('category_id')->constrained()->onDelete('set null'); // Foreign key to the categories table (assumes `categories` table exists)
            $table->string('tags')->nullable(); // Tags associated with the post
            $table->string('meta_title')->nullable(); // Meta title for SEO
            $table->string('meta_description')->nullable(); // Meta description for SEO
            $table->string('meta_keywords')->nullable(); // Meta keywords for SEO
            $table->timestamp('published_at')->nullable(); // Published date/time
            $table->boolean('is_active')->default(true); // Status of the post, active or not
            $table->string('image')->nullable(); // Image URL or file path
            $table->string('feature_image')->nullable(); // Featured image URL or file path
            $table->string('author')->nullable(); // Author of the post
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
        Schema::dropIfExists('posts');
    }
}
