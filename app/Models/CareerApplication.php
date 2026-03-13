<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerApplication extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'mobile', 'position_applied', 'resume_path', 'experience', 'status'];
}
