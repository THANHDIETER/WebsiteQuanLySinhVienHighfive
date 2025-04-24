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
        <p>Không tìm thấy thông tin sinh viên.</p>
    @endif
</div>
@endsection
