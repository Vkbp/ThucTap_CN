@extends('admin.layouts.master')
@section('title', 'Thêm phòng')

@section('content')

<h1 class="h3 mb-3">Thêm phòng mới</h1>

<div class="card">
    <div class="card-body">
        
        <form method="POST" action="{{ route('admin.rooms.store') }}">
            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Số phòng</label>
                    <input type="text" name="room_number" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tòa nhà (Không bắt buộc)</label>
                    <input type="text" name="building" class="form-control" placeholder="A, B, C,...">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Giới tính</label>
                    <select name="gender" class="form-control" required>
                        <option value="male">Nam</option>
                        <option value="female">Nữ</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Sức chứa</label>
                    <input type="number" name="capacity" class="form-control" required min="1">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Diện tích phòng (m²)</label>
                    <input type="number" name="area" class="form-control" placeholder="Ví dụ: 20" step="0.1">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Loại phòng</label>
                    <input type="text" name="room_type" class="form-control" placeholder="Ví dụ: VIP / Thường">
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">Mô tả</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Mô tả phòng, tiện ích..."></textarea>
                </div>

            </div>

            <button class="btn btn-primary">Lưu</button>
        </form>

    </div>
</div>

@endsection
