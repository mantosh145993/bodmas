<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = ['title', 'slug', 'content', 'published'];
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($page) {
            if (empty($page->slug)) {
                $page->slug = Str::slug($page->title, '-');
            }
        });
    }
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }
}

