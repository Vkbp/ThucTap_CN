<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegisterRequest;
use App\Models\StudentOfficial;
use App\Models\PriorityLevel;

class RegisterController extends Controller
{
    /**
     * Hiển thị form đăng ký cho Guest
     */
    public function create()
    {
        $priorities = PriorityLevel::where('active', 1)
                        ->orderBy('score', 'desc')
                        ->get();

        return view('guest.register', compact('priorities'));
    }

    /**
     * Lưu đơn đăng ký lưu trú
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'student_code' => 'required|string|max:50',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'reason' => 'nullable|string',
            'priority_level_id' => 'nullable|exists:priority_levels,id',
        ]);

        // 📌 1. Kiểm tra sinh viên có trong danh sách STU không
        $official = StudentOfficial::where('student_code', $data['student_code'])->first();

        if (! $official) {
            return back()
                ->withInput()
                ->with('error', 'Mã sinh viên không tồn tại trong danh sách chính thức của trường.');
        }

        // 📌 2. Không cho gửi nhiều đơn pending
        $exists = RegisterRequest::where('student_code', $data['student_code'])
                    ->where('status', 'pending')
                    ->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->with('warning', 'Bạn đã gửi đơn và đang chờ duyệt. Hãy kiểm tra trạng thái đăng ký.');
        }

        // 📌 3. Lưu đơn đăng ký
        RegisterRequest::create([
            'full_name' => $data['full_name'],
            'student_code' => $data['student_code'],
            'gender' => $official->gender,
            'dob' => $official->dob ?? null,
            'phone' => $data['phone'],
            'address' => $data['address'],
            'reason' => $data['reason'],
            'priority_level_id' => $data['priority_level_id'],
            'status' => 'pending',
        ]);

        return redirect()->route('guest.register')
            ->with('success', 'Gửi đăng ký thành công! Hãy tra cứu trạng thái bằng MSSV.');
    }

    /**
     * Hiển thị form tra cứu trạng thái
     */
    public function statusForm()
    {
        return view('guest.status');
    }

    /**
     * Xử lý tra cứu trạng thái
     */
    public function checkStatus(Request $request)
    {
        $request->validate([
            'student_code' => 'required|string|max:50',
        ]);

        $result = RegisterRequest::where('student_code', $request->student_code)
                    ->orderBy('created_at', 'desc')
                    ->first();

        return view('guest.status', compact('result'));
    }

    /**
     * Hiển thị trang hướng dẫn
     */
    public function guide()
    {
        return view('guest.guide');
    }
}
