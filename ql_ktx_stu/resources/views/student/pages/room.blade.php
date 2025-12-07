@extends('student.layouts.app')

@section('title', 'Thông tin phòng - giường')

@section('content')

<div class="row">
    <div class="col-md-10 col-lg-8 mx-auto">

        {{-- HEADER --}}
        <div class="mb-4">
            <h1 class="h3 mb-2">Thông Tin Phòng & Giường</h1>
            <p class="text-muted">Xem thông tin nơi ở hiện tại của bạn</p>
        </div>

        @if (!$record)
            <div class="alert alert-warning">
                ⚠️ Bạn chưa được xếp phòng. Vui lòng chờ quản trị viên xử lý.
            </div>
        @else

            {{-- MAIN CARD --}}
            <div class="card shadow-sm mb-4">

                {{-- HEAD --}}
                <div class="card-header bg-primary text-white py-4">
                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <div class="text-uppercase small text-white-50 mb-1">Phòng hiện tại</div>
                            <h2 class="fw-bold display-6 mb-0">{{ $record->room->room_number }}</h2>

                            <div class="mt-2">
                                Giường: 
                                <span class="fw-bold fs-4">{{ $record->bed->bed_code }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- BODY --}}
                <div class="card-body">

                    <div class="row g-3">

                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded border-start border-primary">
                                <small class="text-muted text-uppercase">Số phòng</small>
                                <div class="fs-4 fw-bold">{{ $record->room->room_number }}</div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded border-start border-primary">
                                <small class="text-muted text-uppercase">Số giường</small>
                                <div class="fs-4 fw-bold">{{ $record->bed->bed_code }}</div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded border-start border-primary">
                                <small class="text-muted text-uppercase">Loại phòng</small>
                                <div class="fw-bold">{{ $record->room->room_type ?? 'N/A' }}</div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded border-start border-primary">
                                <small class="text-muted text-uppercase">Sức chứa</small>
                                <div class="fw-bold">{{ $record->room->capacity }} người</div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded border-start border-primary">
                                <small class="text-muted text-uppercase">Từ ngày</small>
                                <div class="fw-bold">
                                    {{ \Carbon\Carbon::parse($record->check_in_date)->format('d/m/Y') }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded border-start border-primary">
                                <small class="text-muted text-uppercase">Đến ngày</small>
                                <div class="fw-bold">
                                    @if ($record->check_out_date)
                                        {{ \Carbon\Carbon::parse($record->check_out_date)->format('d/m/Y') }}
                                    @else
                                        <span class="text-muted">Chưa xác định</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Học kỳ --}}
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted text-uppercase">Học kỳ</small>
                                <div class="fw-bold mt-1">{{ $record->hocKy->semester ?? 'N/A' }}</div>
                            </div>
                        </div>

                        {{-- Mã thẻ --}}
                        @if ($record->card_number)
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted text-uppercase">Mã thẻ cư xá</small>
                                <div class="fw-bold text-primary mt-1">{{ $record->card_number }}</div>
                            </div>
                        </div>
                        @endif

                    </div>

                    {{-- STATUS --}}
                    <div class="mt-4 pt-3 border-top">
                        @if ($record->is_active)
                            <div class="badge bg-success rounded-pill px-3 py-2 fs-6">
                                ● Đang ở
                            </div>
                        @else
                            <div class="badge bg-secondary rounded-pill px-3 py-2 fs-6">
                                ○ Đã rời
                            </div>
                        @endif
                    </div>

                </div> {{-- card-body --}}
            </div>

        @endif

    </div>
</div>

@endsection
