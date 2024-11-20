<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    protected $table = 'colleges';

    // Define fillable fields
    protected $fillable = ['name', 'address', 'state_id','type','course_id','image'];


}
