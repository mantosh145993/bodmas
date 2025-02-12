<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouTubeVideo extends Model {
    use HasFactory;
    protected $table = "youtube_videos";
    protected $fillable = ['title', 'video_id', 'description'];
}