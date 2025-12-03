<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterRequest extends Model
{
    protected $fillable = [
        'full_name', 'student_code', 'gender', 'dob', 'phone',
        'address', 'reason', 'priority_type', 'status', 'note'
    ];
}
