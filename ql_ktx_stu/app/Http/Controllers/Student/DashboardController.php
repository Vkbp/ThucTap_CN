<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\RegisterRequest;
use App\Models\DormitoryRecord;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profile = $user->profile;

        // 1. Đơn đăng ký mới nhất
        $latestRequest = RegisterRequest::where('student_code', $profile->student_code)
            ->orderBy('id', 'desc')
            ->first();

        // 2. Phòng đang ở
        $activeRecord = DormitoryRecord::where('user_id', $user->id)
            ->where('is_active', true)
            ->with(['room', 'bed', 'hocKy'])
            ->first();

        // 3. Tổng số học kỳ đã ở
        $totalSemesters = DormitoryRecord::where('user_id', $user->id)->count();

        return view('student.pages.dashboard', compact(
            'profile',
            'latestRequest',
            'activeRecord',
            'totalSemesters'
        ));
    }
}
