<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = ['title', 'slug','menu_slug', 'content', 'published','state_id','course_id','hierarchy'];
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
    public function menus()
    {
        return $this->hasMany(Menu::class, 'page_id');
    }
}
