<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'child_name',
        'father_name',
        'father_mobile',
        'mother_name',
        'mother_mobile',
        'category_id',
        'email',
        'whatsapp_number',
        'address'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
