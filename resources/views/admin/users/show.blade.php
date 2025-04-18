@extends('layouts.Adminlayout')

@section('content')
<div class="container mt-4">
    <h3>Chi tiết tài khoản</h3>

    <table class="table">
        <tr>
            <th>ID:</th><td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>Tên:</th><td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email:</th><td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Ngày tạo:</th><td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
        </tr>
        <tr>
            <th>Ngày cập nhật:</th><td>{{ $user->updated_at->format('d/m/Y H:i') }}</td>
        </tr>
    </table>

    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Quay lại</a>
</div>
@endsection
