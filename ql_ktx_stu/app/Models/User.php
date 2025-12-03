<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'email',
        'password',
        'role',
    ];

    public function profile()
    {
        return $this->hasOne(PersonalProfile::class, 'user_id');
    }

    public function dormitoryRecords()
    {
        return $this->hasMany(DormitoryRecord::class, 'user_id');
    }

    public function logs()
    {
        return $this->hasMany(ActivityLog::class, 'user_id');
    }
}
