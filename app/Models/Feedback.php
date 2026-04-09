<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'rating',
        'message',
        'photo_path',
        'is_read',
        'admin_response',
        'responded_at'
    ];

    protected $casts = [
        'responded_at' => 'datetime',
    ];
}
