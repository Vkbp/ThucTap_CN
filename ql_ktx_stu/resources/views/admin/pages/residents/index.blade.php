@extends('admin.layouts.master')
@section('title', 'Sinh viên lưu trú')

@section('content')
<h1 class="h3 mb-3"><strong>Sinh viên lưu trú</strong></h1>

<div class="card shadow-sm">
    <div class="card-body">

        {{-- =======================
            📌 FILTER
        ======================== --}}
        <form method="GET" class="row g-2 mb-3">

            <div class="col-md-3">
                <input type="text" name="q" class="form-control"
                       placeholder="Tìm mã SV hoặc họ tên..."
                       value="{{ request('q') }}">
            </div>

            <div class="col-md-2">
                <select name="gender" class="form-control">
                    <option value="">Giới tính</option>
                    <option value="male"   {{ request('gender')=='male' ? 'selected':'' }}>Nam</option>
                    <option value="female" {{ request('gender')=='female' ? 'selected':'' }}>Nữ</option>
                </select>
            </div>

            <div class="col-md-2">
                <select name="room_id" class="form-control">
                    <option value="">Phòng</option>
                    @foreach($rooms as $r)
                        <option value="{{ $r->id }}" {{ request('room_id')==$r->id ? 'selected':'' }}>
                            {{ $r->room_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <select name="hoc_ky_id" class="form-control">
                    <option value="">Học kỳ</option>
                    @foreach($hocKys as $hk)
                        <option value="{{ $hk->id }}" {{ request('hoc_ky_id')==$hk->id ? 'selected':'' }}>
                            {{ $hk->school_year }} - HK{{ $hk->semester }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 text-end">
                <button class="btn btn-primary">Lọc</button>
                <a href="{{ route('admin.residents.index') }}" class="btn btn-outline-secondary">Reset</a>
            </div>

        </form>

        {{-- =======================
            📌 TABLE
        ======================== --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Mã SV</th>
                        <th>Họ tên</th>
                        <th>Phòng</th>
                        <th>Giường</th>
                        <th>Giới tính</th>
                        <th>Khoa</th>
                        <th>Check-in</th>
                        <th>Trạng thái</th>
                        <th style="width: 220px">Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($records as $rec)
                    <tr>
                        <td>{{ $rec->id }}</td>
                        <td>{{ $rec->user->profile->student_code ?? '—' }}</td>
                        <td>{{ $rec->user->profile->full_name ?? '—' }}</td>
                        <td>{{ $rec->room->room_number ?? '—' }}</td>
                        <td>{{ $rec->bed->bed_code ?? '—' }}</td>
                        <td>{{ $rec->user->profile->gender ?? '—' }}</td>
                        <td>{{ $rec->user->profile->department ?? '—' }}</td>
                        <td>{{ $rec->check_in_date }}</td>

                        <td>
                            <span class="badge {{ $rec->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $rec->is_active ? 'Đang ở' : 'Đã rời' }}
                            </span>
                        </td>

                        <td>
                            <button class="btn btn-sm btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#changeRoomModal"
                                data-record-id="{{ $rec->id }}"
                                data-room-id="{{ $rec->room_id }}">
                                Chuyển phòng
                            </button>

                            <button class="btn btn-sm btn-info"
                                data-bs-toggle="modal"
                                data-bs-target="#extendModal"
                                data-record-id="{{ $rec->id }}">
                                Gia hạn
                            </button>

                            <button class="btn btn-sm btn-danger"
                                data-bs-toggle="modal"
                                data-bs-target="#checkoutModal"
                                data-record-id="{{ $rec->id }}">
                                Trả phòng
                            </button>

                            <a href="{{ route('admin.residents.history', $rec->user_id) }}"
                               class="btn btn-sm btn-secondary">
                                Lịch sử
                            </a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center text-muted">Không có sinh viên.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <div class="mt-3"> {{ $records->links() }} </div>

    </div>
</div>

{{-- =============================
    📌 IMPORT MODAL PARTIAL
============================= --}}
@include('admin.pages.residents.partials.modals', ['roomBedMap' => $roomBedMap])

@endsection
