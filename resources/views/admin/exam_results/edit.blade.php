@extends('layouts.Adminlayout')

@section('content')
<div class="container mt-4">
    <h2>Chỉnh sửa kết quả thi</h2>

    <form action="{{ route('admin.exam_results.update', $examResult->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="student_id" class="form-label">Sinh viên</label>
            <select name="student_id" id="student_id" class="form-control">
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ old('student_id', $examResult->student_id) == $student->id ? 'selected' : '' }}>
                        {{ $student->full_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="course_id" class="form-label">Khóa học</label>
            <select name="course_id" id="course_id" class="form-control">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id', $examResult->course_id) == $course->id ? 'selected' : '' }}>
                        {{ $course->course_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="exam_type" class="form-label">Loại bài thi</label>
            <select name="exam_type" id="exam_type" class="form-control">
                @foreach(['Midterm', 'Final', 'Quiz'] as $type)
                    <option value="{{ $type }}" {{ old('exam_type', $examResult->exam_type) == $type ? 'selected' : '' }}>{{ $type }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="score" class="form-label">Điểm</label>
            <input type="number" step="0.01" name="score" id="score" class="form-control" value="{{ old('score', $examResult->score) }}">
        </div>

        <div class="mb-3">
            <label for="exam_date" class="form-label">Ngày thi</label>
            <input type="date" name="exam_date" id="exam_date" class="form-control" value="{{ old('exam_date', $examResult->exam_date) }}">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.exam_results.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
