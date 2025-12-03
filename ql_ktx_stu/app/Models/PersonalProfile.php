<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalProfile extends Model
{
    protected $fillable = [
        'user_id', 'full_name', 'student_code', 'dob', 'gender',
        'phone', 'address', 'hometown', 'citizen_id',
        'priority_type', 'year_admission', 'class_name', 'department', 'avatar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
