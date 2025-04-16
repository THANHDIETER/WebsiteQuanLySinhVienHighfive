@extends('layouts.Adminlayout')

@section('content')
<div class="container mt-4">
    <h2>Thêm Lớp học</h2>

    <form action="{{ route('admin.class_schedules.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="course_id">Khóa Học</label>
            <select name="course_id" id="course_id" class="form-control">
                <option disabled selected>-- Chọn khóa học --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
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
            <select name="teacher_id" id="teacher_id" class="form-control">
                <option disabled selected>-- Chọn giáo viên --</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
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
            <input type="text" name="room" id="room" class="form-control" value="{{ old('room') }}" >
            @error('room')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="day_of_week">Day of the Week</label>
            <select name="day_of_week" id="day_of_week" class="form-control" >
                <option value="Monday" {{ old('day_of_week') == 'Monday' ? 'selected' : '' }}>Monday</option>
                <option value="Tuesday" {{ old('day_of_week') == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                <option value="Wednesday" {{ old('day_of_week') == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                <option value="Thursday" {{ old('day_of_week') == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                <option value="Friday" {{ old('day_of_week') == 'Friday' ? 'selected' : '' }}>Friday</option>
                <option value="Saturday" {{ old('day_of_week') == 'Saturday' ? 'selected' : '' }}>Saturday</option>
            </select>
            @error('day_of_week')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        

        <div class="form-group">
            <label for="start_time">Giờ bắt đầu</label>
            <input type="time" name="start_time" id="start_time" class="form-control" value="{{ old('start_time') }}" >
            @error('start_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="end_time">Giờ kết thúc</label>
            <input type="time" name="end_time" id="end_time" class="form-control" value="{{ old('end_time') }}" >
            @error('end_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm Lịch Học</button>
    </form>
</div>
@endsection
