@extends('layouts.AdminLayout')

@section('content')
<div class="container mt-4">
    <h3>Thêm tài khoản người dùng</h3>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label for="name">Tên</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="form-group mb-2">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="form-group mb-3">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
