<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderBanner extends Model
{
    use HasFactory;
    protected $table = 'slider_banners';
    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'is_active',
        'order_index',
    ];

    // Optionally, you can define relationships here if needed
}
