<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Predictor extends Model
{
   protected $table = "predictors";
   protected $fillable = ['name','number','rank','state','course','budget'];
}
