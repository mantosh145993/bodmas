<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Model;

class Rank_cutoff extends Model
{
    use HasFactory;

    protected $table = 'rank_cutoffs';

    protected $fillable = ['college_id', 'category_id', 'course_id', 'rank_cutoff','round', 'year'];

    // Define the relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Define the relationship with the Course model
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // Define the relationship with the College model
    public function college()
    {
        return $this->belongsTo(College::class, 'college_id');
    }
}

