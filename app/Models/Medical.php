<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    protected $table='medicals';
    protected $fillable = ['college_id','college_name','course','address','category','rank','round'];
}
