<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'avatar',
        'content',
        'rating',
        'type',
        'passing_year',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active'   => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderByDesc('is_featured');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
