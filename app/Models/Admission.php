<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    protected $fillable = ['student_name', 'dob', 'parent_name', 'email', 'mobile', 'whatsapp', 'grade_applying', 'address', 'status'];
}
