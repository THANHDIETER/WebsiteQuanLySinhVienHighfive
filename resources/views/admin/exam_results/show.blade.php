@extends('layouts.AdminLayout')

@section('content')
<div class="container">
    <h2>Chi tiết kết quả thi</h2>

    <ul class="list-group">
        <li class="list-group-item"><strong>Sinh viên:</strong> {{ $examResult->student->full_name }}</li>
        <li class="list-group-item"><strong>Khóa học:</strong> {{ $examResult->course->course_name }}</li>
        <li class="list-group-item"><strong>Loại bài thi:</strong> {{ $examResult->exam_type }}</li>
        <li class="list-group-item"><strong>Điểm:</strong> {{ $examResult->score }}</li>
        <li class="list-group-item"><strong>Ngày thi:</strong> {{ $examResult->exam_date }}</li>
    </ul>

    <a href="{{ route('admin.exam_results.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
</div>
@endsection
