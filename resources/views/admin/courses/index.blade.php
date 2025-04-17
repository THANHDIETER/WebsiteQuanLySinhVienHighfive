@extends('layouts.AdminLayout')

@section('content')
    <h2 class="mb-4 text-center">Danh sách môn học</h2>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.courses.create') }}" class="btn btn-sm btn-primary">
            ➕ Thêm môn học
        </a>
        <a href="{{ route('admin.courses.trash') }}" class="btn btn-sm btn-warning">
            🗑️ Xem thùng rác
        </a>
    </div>

    <table class="table table-bordered table-striped align-middle text-center">
        <thead class="table-dark">
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
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->course_code }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->credits }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->teacher?->full_name ?? 'Chưa phân công' }}</td>
                    <td>
                        <div class="d-flex gap-1 justify-content-center flex-wrap">
                            <a href="{{ route('admin.courses.edit', $course->id) }}"
                               class="btn btn-sm btn-warning d-flex align-items-center"> Sửa</a>
                        
                            <a href="{{ route('admin.courses.show', $course->id) }}"
                               class="btn btn-sm btn-info d-flex align-items-center"> Chi tiết</a>
                        
                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="mb-0">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm btn-danger d-flex align-items-center"
                                        onclick="return confirm('Bạn có chắc chắn muốn xoá môn học này?')">
                                     Xoá mềm
                                </button>
                            </form>
                        </div>                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end mt-3">
        {{ $courses->links('pagination::bootstrap-5') }}
    </div>
@endsection
