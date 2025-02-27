<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'course',
        'message',
        'type',
        'notes',
        'status',
        'assigned_user_id',
        'assigned_at',
        'action_taken'
    ];
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }

}

