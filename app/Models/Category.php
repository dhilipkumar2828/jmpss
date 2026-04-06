<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['standard', 'section'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
