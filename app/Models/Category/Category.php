<?php

namespace App\Models\Category;

use App\Models\Course;
use App\Models\Rank_cutoff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'description', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Define the children relationship
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function grandchildren()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id');
    }

    public function rank_cutoffs()
    {
        return $this->hasMany(Rank_cutoff::class, 'category_id', 'id'); // 'category_id' is the foreign key in 'rank_cutoffs', 'id' is the primary key in 'categories'
    }
}
