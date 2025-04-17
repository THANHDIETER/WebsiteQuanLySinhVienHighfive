@extends('layouts.AdminLayout')

@section('content')
    <div class="container">
        <h2>Sửa thông tin giảng viên</h2>

        <form action="{{ route('admin.teachers.update', $teacher->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.teachers._form', ['teacher' => $teacher])
            <button type="submit" class="btn btn-warning">Cập nhật</button>
            <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
