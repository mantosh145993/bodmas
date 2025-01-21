<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners';

    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'is_active',
        'order_index',
        'page_id', // Foreign key to associate with pages
    ];

    // Define the relationship with the Page model
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
    
}

