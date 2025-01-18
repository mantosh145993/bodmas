<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'links';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'state_id',
        'link',
        'status'
    ];

    /**
     * Define a relationship to the state (if applicable).
     * Adjust the related model name and method as needed.
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
