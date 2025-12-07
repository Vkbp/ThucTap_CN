@extends('guest.layouts.master')

@section('title', 'Tra cứu trạng thái')

@section('content')
<div class="card shadow-sm p-4">

    <h3 class="fw-bold mb-3">🔍 Tra cứu trạng thái đăng ký</h3>

    <form method="POST" action="{{ route('guest.status.check') }}">
        @csrf

        <label class="form-label fw-semibold">Nhập MSSV</label>
        <input type="text" name="student_code" class="form-control mb-3"
               placeholder="VD: DH521234" required>

        <button class="btn btn-primary">Tra cứu</button>
    </form>

    @isset($result)
        <hr>
        <h5 class="fw-bold">Kết quả:</h5>

        <p><strong>Họ tên:</strong> {{ $result->full_name }}</p>
        <p><strong>Trạng thái:</strong> 
            <span class="badge bg-info">{{ $result->status }}</span>
        </p>
    @endisset

</div>
@endsection
