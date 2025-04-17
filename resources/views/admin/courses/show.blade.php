@extends('layouts.AdminLayout')

@section('main')
<div class="container mt-4">
    <h2>Chi tiết môn học</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Mã môn học: {{ $course->course_code }}</h5>
            <p class="card-text"><strong>Tên môn học:</strong> {{ $course->course_name }}</p>
            <p class="card-text"><strong>Số tín chỉ:</strong> {{ $course->credits }}</p>
            <p class="card-text"><strong>Mô tả:</strong><br> {{ $course->description }}</p>
            <p class="card-text"><strong>Giáo viên phụ trách:</strong>
                {{ $course->teacher?->full_name ?? 'Chưa phân công' }}
            </p>
        </div>
    </div>

    <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary mt-3">Quay lại danh sách</a>
    <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning mt-3">Chỉnh sửa</a>
</div>
@endsection
