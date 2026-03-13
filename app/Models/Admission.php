<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    protected $fillable = ['student_name', 'parent_name', 'email', 'mobile', 'grade_applying', 'address', 'status'];
}
