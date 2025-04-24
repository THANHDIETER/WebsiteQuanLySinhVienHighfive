@extends('layouts.app')

@section('content')
<div class="container">
    @if ($student)
        <h1>Chào, {{ $student->full_name }}</h1>  <!-- Hiển thị tên đầy đủ của sinh viên -->

        <div class="mb-4">
            <h4>Lịch học sắp tới</h4>
            <ul>
                @forelse ($upcomingSchedules as $schedule)
                    <li>{{ $schedule->schedule_date->format('d/m/Y') }} - {{ $schedule->course->name }}</li>
                @empty
                    <li>Không có lịch học nào sắp tới.</li>
                @endforelse
            </ul>
        </div>

        <div class="mb-4">
            <h4>Thông báo mới</h4>
            <ul>
                @forelse ($notifications as $notification)
                    <li>{{ $notification->message }} - {{ $notification->created_at->format('d/m/Y') }}</li>
                @empty
                    <li>Không có thông báo nào.</li>
                @endforelse
            </ul>
        </div>

        <div class="mb-4">
            <h4>Thông tin cá nhân</h4>
            <p><strong>MSSV:</strong> {{ $student->student_code }}</p>
            <p><strong>Email:</strong> {{ $student->email }}</p>
            <p><strong>Lớp:</strong> {{ $student->class }}</p>
        </div>
    @else
    <div class="container py-4">
        <h1 class="mb-4">📚 Student Dashboard</h1>
    
        {{-- Lịch học hôm nay --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                🗓️ Lịch học hôm nay
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">8:00 - 9:30: Lập trình PHP tại Phòng B101</li>
                    <li class="list-group-item">10:00 - 11:30: Thiết kế Web tại Phòng A204</li>
                    <li class="list-group-item">13:00 - 14:30: Cơ sở dữ liệu tại Phòng C302</li>
                </ul>
            </div>
        </div>
    
        {{-- Thông báo mới --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-warning">
                🔔 Thông báo mới
            </div>
            <div class="card-body">
                <p><strong>Thông báo:</strong> Ngày 26/04 sẽ nghỉ học tiết chiều vì tổ chức hội thảo CNTT tại hội trường lớn.</p>
                <p><strong>Ghi chú:</strong> Nhớ hoàn thành bài tập nhóm trước ngày 28/04.</p>
            </div>
        </div>
    
        {{-- Thông tin cá nhân --}}
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                👤 Thông tin sinh viên
            </div>
            <div class="card-body">
                <p><strong>Họ tên:</strong> Nguyễn Văn A</p>
                <p><strong>Mã sinh viên:</strong> PS12345</p>
                <p><strong>Lớp:</strong> WD1234 - Lập trình web</p>
                <p><strong>Email:</strong> nguyenvana@example.com</p>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
