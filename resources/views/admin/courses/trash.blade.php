@extends('layouts.AdminLayout')

@section('content')
<h2>Danh sách khóa học đã xóa</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã MH</th>
            <th>Tên MH</th>
            <th>Giáo viên</th>
            <th>Thời gian xóa</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>
            <td>{{ $course->course_code }}</td>
            <td>{{ $course->course_name }}</td>
            <td>{{ $course->teacher->name ?? 'Chưa có' }}</td>
            <td>{{ $course->deleted_at->format('d/m/Y H:i') }}</td>
            <td>
                <form action="{{ route('admin.courses.restore', $course->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    <button class="btn btn-sm btn-primary">Khôi phục</button>
                </form>

                <form action="{{ route('admin.courses.forceDelete', $course->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn chắc chắn muốn xóa vĩnh viễn?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xoá hoàn toàn ko?')">Xóa vĩnh viễn</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $courses->links() }}

<a href="{{ route('admin.courses.index') }}" class="btn btn-secondary mt-3">← Quay lại danh sách</a>
@endsection
