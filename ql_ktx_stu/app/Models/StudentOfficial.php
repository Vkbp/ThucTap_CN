<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentOfficial extends Model
{
    protected $fillable = [
        'student_code',
        'full_name',
        'gender',
        'department',
        'class_name',
    ];
}
