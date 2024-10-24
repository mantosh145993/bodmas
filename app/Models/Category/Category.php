<?php

namespace App\Models\Category;

use App\Models\Course;
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
}
