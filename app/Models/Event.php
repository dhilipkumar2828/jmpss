<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'event_date',
        'event_time',
        'venue',
        'category',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_featured' => 'boolean',
        'is_active'   => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('event_date', 'desc');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->event_date)->format('d M, Y');
    }

    public function isUpcoming()
    {
        return $this->event_date >= Carbon::today();
    }
}
