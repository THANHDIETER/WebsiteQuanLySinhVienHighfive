@extends('layouts.AdminLayout')

@section('content')
    <h2 class="mb-4">Chi tiết giảng viên</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Mã giảng viên:</strong> {{ $teacher->teacher_code }}</p>
            <p><strong>Họ và tên:</strong> {{ $teacher->full_name }}</p>
            <p><strong>Email:</strong> {{ $teacher->email }}</p>
            <p><strong>SĐT:</strong> {{ $teacher->phone }}</p>
            <p><strong>Bộ môn:</strong> {{ $teacher->department }}</p>
        </div>
    </div>

    <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="btn btn-warning mt-3">Sửa</a>
    <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
@endsection
