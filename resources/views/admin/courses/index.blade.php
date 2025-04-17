@extends('layouts.AdminLayout')

@section('main')
<h2>Danh sách môn học</h2>

<a href="{{ route('admin.courses.create') }}" class="btn btn-primary mb-3">Thêm môn học</a>
<a href="{{ route('admin.courses.trash') }}" class="btn btn-warning mb-3">🗑️ Xem thùng rác</a>
{{-- <a href="{{ route('courses.trash') }}" class="btn btn-secondary mb-3">Xem thùng rác</a> --}}

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã môn</th>
            <th>Tên môn</th>
            <th>Tín chỉ</th>
            <th>Mô tả</th>
            <th>Giáo viên</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>
            <td>{{ $course->course_code }}</td>
            <td>{{ $course->course_name }}</td>
            <td>{{ $course->credits }}</td>
            <td>{{ $course->description }}</td>
            <td>{{ $course->teacher?->full_name ?? 'Chưa phân công' }}</td>
            <td>
                <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-sm btn-warning">Chi tiết</a>
                



                <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xoá môn học này?')">Xoá mềm</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<div class="d-flex justify-content-end mt-3" >
    {{ $courses->links('pagination::bootstrap-5') }}
</div>
@endsection
