<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = "notices";

    protected $fillable = [
        'state_id',
        'type',
        'title',
        'description',
        'file',
    ];
}
