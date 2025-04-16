@extends('layouts.Adminlayout')

@section('content')
<div class="container mt-4">
    <h2>Sửa Lịch Học</h2>

    <!-- Hiển thị thông báo lỗi chung -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.class_schedules.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="course_id">Khóa Học</label>
            <select name="course_id" id="course_id" class="form-control" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id', $schedule->course_id) == $course->id ? 'selected' : '' }}>
                        {{ $course->course_name }} ({{ $course->course_code }}) - {{ $course->credits }} tín chỉ
                    </option>
                @endforeach
            </select>
            @error('course_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="teacher_id">Giáo Viên</label>
            <select name="teacher_id" id="teacher_id" class="form-control" required>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ old('teacher_id', $schedule->teacher_id) == $teacher->id ? 'selected' : '' }}>
                        {{ $teacher->full_name }} ({{ $teacher->teacher_code }}) - {{ $teacher->department }}
                    </option>
                @endforeach
            </select>
            @error('teacher_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="room">Phòng</label>
            <input type="text" name="room" id="room" class="form-control" value="{{ old('room', $schedule->room) }}" required>
            @error('room')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="day_of_week">Ngày trong tuần</label>
            <input type="text" name="day_of_week" id="day_of_week" class="form-control" value="{{ old('day_of_week', $schedule->day_of_week) }}" required>
            @error('day_of_week')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="start_time">Giờ bắt đầu</label>
            <input type="time" name="start_time" id="start_time" class="form-control"
                value="{{ old('start_time', isset($schedule) ? \Carbon\Carbon::parse($schedule->start_time)->format('H:i') : '') }}" required>
            @error('start_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="end_time">Giờ kết thúc</label>
            <input type="time" name="end_time" id="end_time" class="form-control"
                value="{{ old('end_time', isset($schedule) ? \Carbon\Carbon::parse($schedule->end_time)->format('H:i') : '') }}" required>
            @error('end_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        
        

        <button type="submit" class="btn btn-primary">Cập Nhật Lịch Học</button>
    </form>
</div>
@endsection
