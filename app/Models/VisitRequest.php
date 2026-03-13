<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitRequest extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'mobile', 'visit_date', 'visit_time', 'purpose', 'status'];
}
