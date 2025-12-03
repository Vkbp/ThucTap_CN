<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_number', 'building', 'gender',
        'capacity', 'area', 'room_type', 'description'
    ];

    public function beds()
    {
        return $this->hasMany(Bed::class, 'room_id');
    }

    public function dormitoryRecords()
    {
        return $this->hasMany(DormitoryRecord::class, 'room_id');
    }

    public function availableBeds()
    {
        return $this->hasMany(Bed::class, 'room_id')->where('status', 'available');
    }
}
