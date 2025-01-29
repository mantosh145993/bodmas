<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    const STATUS_DRAFT = 'draft';
    const STATUS_PUBLISHED = 'published';
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
        'author_description',
        'status',
        'views'
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope for draft posts
    public function scopeDraft($query)
    {
        return $query->where('status', self::STATUS_DRAFT);
    }

    // Scope for published posts
    public function scopePublished($query)
    {
        return $query->where('status', self::STATUS_PUBLISHED);
    }
    
    public function incrementViews()
    {
        $this->increment('views');
    }
}
