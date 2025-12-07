@extends('admin.layouts.master')
@section('title', 'Quản lý phòng')

@section('content')

<h1 class="h3 mb-3"><strong>Quản lý phòng</strong></h1>

<div class="card">
    <div class="card-body">

        <!-- SEARCH + BUTTON -->
        <div class="d-flex justify-content-between mb-3">

            <form class="d-flex" method="GET">
                <input type="text" name="search" class="form-control" 
                       placeholder="Tìm theo số phòng..." value="{{ $keyword }}">
                <button class="btn btn-primary ms-2">Tìm</button>
            </form>

            <a href="{{ route('admin.rooms.create') }}" class="btn btn-success">
                <i class="align-middle" data-feather="plus"></i> Thêm phòng
            </a>
        </div>

        <!-- TABLE -->
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>Số phòng</th>
                    <th>Tầng</th>
                    <th>Giới tính</th>
                    <th>Giường</th>
                    <th>Loại</th>
                    <th>Diện tích</th>
                    <th>Thao tác</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($rooms as $room)
                <tr>

                    <td class="fw-bold">{{ $room->room_number }}</td>

                    {{-- Tầng --}}
                    <td>{{ $room->floor }}</td>

                    <td>
                        <span class="badge bg-{{ $room->gender == 'male' ? 'primary' : 'danger' }}">
                            {{ $room->gender == 'male' ? 'Nam' : 'Nữ' }}
                        </span>
                    </td>

                    <td>
                        <span class="badge bg-success">
                            {{ $room->beds->count() }} giường
                        </span>
                        <br>
                        <small>
                            Trống: {{ $room->beds->where('status','available')->count() }} |
                            Đang dùng: {{ $room->beds->where('status','occupied')->count() }}
                        </small>
                    </td>

                    <td>{{ $room->room_type ?? '—' }}</td>

                    <td>{{ $room->area ? $room->area . ' m²' : '—' }}</td>

                    <td>
                        <a href="{{ route('admin.rooms.edit', $room) }}" 
                           class="btn btn-sm btn-warning">
                            <i data-feather="edit"></i>
                        </a>

                        <form action="{{ route('admin.rooms.destroy', $room) }}" 
                              method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Xóa phòng này?')" 
                                    class="btn btn-sm btn-danger">
                                <i data-feather="trash-2"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- PAGINATION -->
        <div class="mt-3">
            {{ $rooms->links() }}
        </div>

    </div>
</div>

@endsection
