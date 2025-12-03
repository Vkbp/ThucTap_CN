@extends('admin.layouts.master')
@section('title', 'Cập nhật phòng')

@section('content')

<h1 class="h3 mb-3">Cập nhật phòng</h1>

<div class="card">
    <div class="card-body">
        
        <form method="POST" action="{{ route('admin.rooms.update', $room) }}">
            @csrf @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Số phòng</label>
                    <input type="text" name="room_number" 
                           value="{{ $room->room_number }}" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tòa nhà</label>
                    <input type="text" name="building" 
                           value="{{ $room->building }}" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Giới tính</label>
                    <select name="gender" class="form-control" required>
                        <option value="male"   {{ $room->gender=='male'?'selected':'' }}>Nam</option>
                        <option value="female" {{ $room->gender=='female'?'selected':'' }}>Nữ</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Sức chứa</label>
                    <input type="number" name="capacity" class="form-control"
                           value="{{ $room->capacity }}" min="1" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Diện tích (m²)</label>
                    <input type="number" name="area" class="form-control" 
                           step="0.1" value="{{ $room->area }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Loại phòng</label>
                    <input type="text" name="room_type" class="form-control"
                           value="{{ $room->room_type }}" placeholder="VD: VIP, Thường...">
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">Mô tả</label>
                    <textarea name="description" class="form-control" rows="3">{{ $room->description }}</textarea>
                </div>

            </div>

            <button class="btn btn-primary">Cập nhật</button>

        </form>

    </div>
</div>

@endsection
