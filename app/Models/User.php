<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'email',
        'phone',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin()
    {
        return $this->is_admin === '1';  // assuming 'is_admin' column exists and '1' is a role
    }

    public function routeNotificationForTwilioWhatsApp()
    {
        return 'whatsapp:' . $this->phone; // Ensure phone number is in WhatsApp format
    }
    public function assignedLeads()
    {
        return $this->hasMany(Partner::class, 'assigned_user_id');
    }

    public function respondedLeads()
    {
        return $this->hasMany(Partner::class, 'assigned_user_id')->where('status', 'responded');
    }

}

