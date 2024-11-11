<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatbot extends Model
{
    use HasFactory;
    protected $table = 'chatbots';

    // Define the fillable fields
    protected $fillable = [
        'question',
        'reply',
    ];
  
}
