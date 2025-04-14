@extends('layouts.AdminLayout')

@section('content')
    <div class="container">
        <h2>Danh sách Giảng viên</h2>

        <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary mb-3">+ Thêm mới</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã GV</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Điện thoại</th>
                    <th>Bộ môn</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->teacher_code }}</td>
                        <td>{{ $teacher->full_name }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->phone }}</td>
                        <td>{{ $teacher->department }}</td>
                        <td>
                              <a href="{{ route('admin.teachers.show', $teacher->id) }}" class="btn btn-info btn-sm">Xem</a>
                            <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                            <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xoá?')">Xoá</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
