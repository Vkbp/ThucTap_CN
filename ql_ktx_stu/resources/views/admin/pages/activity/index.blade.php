@extends('admin.layouts.master')
@section('title', 'Lịch sử hoạt động')

@section('content')
<h1 class="h3 mb-3">Lịch sử hoạt động hệ thống</h1>

<div class="card">
    <div class="card-body">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Người thực hiện</th>
                    <th>Hành động</th>
                    <th>Mô tả</th>
                    <th>IP</th>
                    <th>Thời gian</th>
                </tr>
            </thead>

            <tbody>
                @forelse($logs as $log)
                    <tr>
                        <td>{{ $log->user->profile->full_name ?? $log->user->email }}</td>
                        <td><span class="badge bg-primary">{{ $log->action }}</span></td>
                        <td>{{ $log->description }}</td>
                        <td>{{ $log->ip_address }}</td>
                        <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                    
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Chưa có hoạt động nào.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">{{ $logs->links() }}</div>
    </div>
</div>

@endsection
