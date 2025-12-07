<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RegisterRequest;
use App\Models\PriorityLevel;
use App\Models\Room;
use App\Models\Bed;
use App\Models\User;
use App\Models\PersonalProfile;
use App\Models\DormitoryRecord;
use App\Models\HocKy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterRequestController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;

        $requests = RegisterRequest::with('priority')
            ->when($status, fn($q) => $q->where('status', $status))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.pages.register-requests.index', compact('requests', 'status'));
    }

    /**
     * Show chi tiết hồ sơ + gợi ý phòng + giường trống cụ thể
     */
    public function show($id)
    {
        $req = RegisterRequest::with('priority')->findOrFail($id);

        // Rooms matching gender and with at least one available bed
        $rooms = Room::withCount(['beds as used_beds' => fn($q) => $q->where('status','occupied')])
            ->withCount(['beds as total_beds' => fn($q) => $q])
            ->when($req->gender, fn($q) => $q->where('gender', $req->gender))
            ->get()
            ->filter(fn($room) => $room->used_beds < $room->total_beds);

        // For convenience, also prepare explicit available beds (room_id => beds)
        $availableBeds = Bed::where('status', 'available')
            ->whereIn('room_id', $rooms->pluck('id')->toArray())
            ->orderBy('room_id')
            ->orderBy('bed_code')
            ->get()
            ->groupBy('room_id');

        // detect if old student
        $isOld = $req->isOldStudent();

        return view('admin.pages.register-requests.show', compact('req', 'rooms', 'availableBeds', 'isOld'));
    }

    /**
     * Approve: admin must choose either room_id (and we pick first available bed),
     * or bed_id directly (preferable). We'll accept both: if bed_id present -> use it,
     * else look for available bed in room_id.
     */
    public function approve(Request $request, $id)
    {
        $req = RegisterRequest::findOrFail($id);

        if ($req->status !== 'pending') {
            return back()->with('error', 'Hồ sơ này đã được xử lý.');
        }

        $request->validate([
            'room_id' => 'nullable|exists:rooms,id',
            'bed_id'  => 'nullable|exists:beds,id',
            // optional: hoc_ky_id if admin selects it
            'hoc_ky_id' => 'nullable|exists:hoc_kys,id',
        ]);

        DB::beginTransaction();
        try {
            // find target bed
            $targetBed = null;

            if ($request->filled('bed_id')) {
                $targetBed = Bed::where('id', $request->bed_id)
                                ->where('status', 'available')
                                ->first();

                if (!$targetBed) {
                    return back()->with('error', 'Giường được chọn không hợp lệ hoặc đã bị chiếm.');
                }
            } elseif ($request->filled('room_id')) {
                $targetBed = Bed::where('room_id', $request->room_id)
                                ->where('status', 'available')
                                ->first();

                if (!$targetBed) {
                    return back()->with('error', 'Phòng không còn giường trống!');
                }
            } else {
                return back()->with('error', 'Phải chọn phòng hoặc giường để xếp.');
            }

            // 2. Find or create user (SV mới) — using convention email
            $email = $req->student_code . '@student.stu.edu.vn';
            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'password' => Hash::make('123456'),
                    'role' => 'student'
                ]
            );

            // 3. Create/update profile
            PersonalProfile::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'full_name' => $req->full_name,
                    'student_code' => $req->student_code,
                    'gender' => $req->gender,
                    'dob' => $req->dob,
                    'phone' => $req->phone,
                    'address' => $req->address,
                ]
            );

            // 4. Mark bed occupied
            $targetBed->update(['status' => 'occupied']);

            // 5. Determine hoc_ky_id
            $hocKyId = $request->hoc_ky_id;
            if (!$hocKyId) {
                $activeHocKy = HocKy::where('is_active', true)->first();
                if ($activeHocKy) $hocKyId = $activeHocKy->id;
            }
            if (!$hocKyId) {
                // fallback: pick most recent or 1
                $hocKyId = HocKy::orderBy('id','desc')->value('id') ?? 1;
            }

            // 6. create dormitory record
            DormitoryRecord::create([
                'user_id' => $user->id,
                'hoc_ky_id' => $hocKyId,
                'room_id' => $targetBed->room_id,
                'bed_id' => $targetBed->id,
                'check_in_date' => now(),
            ]);

            // 7. update register request
            $req->update([
                'status' => 'approved',
                'approved_by' => auth()->id(),
                'approved_at' => now(),
            ]);

            DB::commit();
            return redirect()->route('admin.register-requests.index')->with('success', 'Duyệt thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Lỗi xử lý: ' . $e->getMessage());
        }
    }

    public function reject(Request $request, $id)
    {
        $req = RegisterRequest::findOrFail($id);

        $request->validate([
            'rejected_reason' => 'required|string'
        ]);

        $req->update([
            'status' => 'rejected',
            'rejected_reason' => $request->rejected_reason,
            'rejected_by' => auth()->id(),
            'rejected_at' => now()
        ]);

        return back()->with('success', 'Từ chối hồ sơ thành công!');
    }
}
