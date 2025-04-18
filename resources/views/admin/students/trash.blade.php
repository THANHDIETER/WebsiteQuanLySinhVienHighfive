@extends('layouts.Adminlayout')

@section('title', 'Thùng rác - Sinh viên')

@section('content')
    <div class="container">
        <h3>Danh sách sinh viên đã bị chặn</h3>
        <a href="{{ route('admin.students.index') }}" class="btn btn-primary mb-3">Quay lại danh sách</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10%;">Mã sinh viên</th>
                    <th style="width: 20%;">Họ và tên</th>
                    <th style="width: 10%;">Giới tính</th>
                    <th style="width: 20%;">Email</th>
                    <th style="width: 15%;">Điện thoại</th>
                    <th style="width: 15%;">Ngày vào</th>
                    <th style="width: 10%;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>{{ $student->student_code }}</td>
                        <td>{{ $student->full_name }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <form action="{{ route('admin.students.restore', $student->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button class="btn btn-success btn-sm" onclick="return confirm('Khôi phục sinh viên này?')">Khôi phục</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center">Không có sinh viên nào trong thùng rác.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
