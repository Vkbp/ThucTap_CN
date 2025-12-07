<?php
namespace App\Observers;

use App\Models\Bed;
use App\Models\ActivityLog;

class BedObserver
{
    public function created(Bed $bed)
    {
        ActivityLog::create([
            'user_id'     => auth()->id(),
            'model_type'  => Bed::class,
            'model_id'    => $bed->id,
            'action'      => 'created',
            'description' => "Thêm mới giường {$bed->bed_code} trong phòng {$bed->room_id}",
            'ip_address'  => request()->ip(),
            'created_at' => now(),
        ]);
    }

    public function updated(Bed $bed)
    {
        ActivityLog::create([
            'user_id'     => auth()->id(),
            'model_type'  => Bed::class,
            'model_id'    => $bed->id,
            'action'      => 'updated',
            'description' => "Cập nhật giường {$bed->bed_code} trong phòng {$bed->room_id}",
            'ip_address'  => request()->ip(),
            'created_at' => now(),
        ]);
    }

    public function deleted(Bed $bed)
    {
        ActivityLog::create([
            'user_id'     => auth()->id(),
            'model_type'  => Bed::class,
            'model_id'    => $bed->id,
            'action'      => 'deleted',
            'description' => "Xóa giường {$bed->bed_code} khỏi phòng {$bed->room_id}",
            'ip_address'  => request()->ip(),
            'created_at' => now(),
        ]);
    }
}
