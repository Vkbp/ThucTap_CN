@extends('admin.layouts.master')

@section('title', 'Dashboard Admin')

@section('content')

<h1 class="h3 mb-3"><strong>Thống kê</strong> tổng quan</h1>

<div class="row">

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Tổng phòng</h5>
                <h2>0</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Giường trống</h5>
                <h2>0</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Sinh viên đang ở</h5>
                <h2>0</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Hồ sơ chờ duyệt</h5>
                <h2>0</h2>
            </div>
        </div>
    </div>

</div>

@endsection
