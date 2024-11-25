<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    // Define the fillable fields
    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'user_id',
        'category_id',
        'tags',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'published_at',
        'is_active',
        'image',
        'feature_image',
        'feature_description',
        'author',
        'author_description'
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
}
