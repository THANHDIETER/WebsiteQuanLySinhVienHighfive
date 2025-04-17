@extends('layouts.AdminLayout')

@section('content')
<h2>Sửa môn học</h2>
<form action="{{ route('admin.courses.update', $course->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Mã môn học</label>
        <input type="text" name="course_code" class="form-control" value="{{ $course->course_code }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Tên môn học</label>
        <input type="text" name="course_name" class="form-control" value="{{ $course->course_name }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Tín chỉ</label>
        <input type="number" name="credits" class="form-control" value="{{ $course->credits }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea name="description" class="form-control">{{ $course->description }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Giáo viên phụ trách</label>
        <select name="teacher_id" class="form-select">
            <option value="">-- Chọn giáo viên --</option>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ $course->teacher_id == $teacher->id ? 'selected' : '' }}>
                    {{ $teacher->full_name }} {{-- Đảm bảo 'name' là cột tên trong bảng teachers --}}
                </option>
            @endforeach
        </select>
    </div>
    
    <button class="btn btn-success">Cập nhật</button>
</form>
@endsection
