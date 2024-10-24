<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    // Define fillable fields
    protected $fillable = ['title', 'description', 'duration', 'category_id'];

    // Define the relationship to the Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
