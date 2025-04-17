@extends('layouts.AdminLayout')

@section('main')
<h2>Thêm môn học</h2>
<form action="{{ route('admin.courses.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Mã môn học</label>
        <input type="text" name="course_code" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Tên môn học</label>
        <input type="text" name="course_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Tín chỉ</label>
        <input type="number" name="credits" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="teacher_id">Giáo viên phụ trách</label>
        <select name="teacher_id" id="teacher_id" class="form-control">
            <option value="">-- Chọn giáo viên --</option>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                    {{ $teacher->full_name }}
                </option>
            @endforeach
        </select>
        @error('teacher_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    
    <button class="btn btn-success">Lưu</button>
</form>
@endsection
