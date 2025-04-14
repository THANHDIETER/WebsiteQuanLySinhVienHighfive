@extends('layouts.AdminLayout')

@section('content')
    <div class="container">
        <h2 class="mb-4">Thêm giảng viên</h2>

        <form action="{{ route('admin.teachers.store') }}" method="POST">
            @csrf
            @include('admin.teachers._form', ['teacher' => null])
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
