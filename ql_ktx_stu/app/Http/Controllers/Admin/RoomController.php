<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // DANH SÁCH PHÒNG
    public function index(Request $request)
    {
        $keyword = $request->search;

        $rooms = Room::when($keyword, function ($query, $keyword) {
            return $query->where('room_number', 'like', "%$keyword%");
        })->paginate(10);

        return view('admin.pages.rooms.index', compact('rooms', 'keyword'));
    }

    // FORM THÊM PHÒNG
    public function create()
    {
        return view('admin.pages.rooms.create');
    }

    // LƯU PHÒNG
    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required|unique:rooms',
            'gender' => 'required',
            'capacity' => 'required|integer|min:1',
            'floor' => 'required|integer|min:1',  // ⭐ BẮT BUỘC
            'area' => 'nullable|numeric',
            'room_type' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        Room::create([
            'room_number' => $request->room_number,
            'gender' => $request->gender,
            'capacity' => $request->capacity,
            'floor' => $request->floor,
            'area' => $request->area,
            'room_type' => $request->room_type,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.rooms.index')->with('success', 'Thêm phòng thành công!');
    }

    // FORM SỬA
    public function edit(Room $room)
    {
        return view('admin.pages.rooms.edit', compact('room'));
    }

    // CẬP NHẬT
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_number' => "required|unique:rooms,room_number,{$room->id}",
            'gender' => 'required',
            'capacity' => 'required|integer|min:1',
            'floor' => 'required|integer|min:1', // ⭐ BẮT BUỘC
            'area' => 'nullable|numeric',
            'room_type' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $room->update([
            'room_number' => $request->room_number,
            'gender' => $request->gender,
            'capacity' => $request->capacity,
            'floor' => $request->floor,
            'area' => $request->area,
            'room_type' => $request->room_type,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.rooms.index')->with('success', 'Cập nhật thành công!');
    }

    // XOÁ
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Xóa phòng thành công!');
    }
}
