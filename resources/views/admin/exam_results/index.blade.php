@extends('layouts.AdminLayout')

@section('content')
<div class="container mt-4">
    <h2>Danh sách kết quả thi</h2>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
    <a href="{{ route('admin.exam_results.create') }}" class="btn btn-primary mb-3">+ Thêm mới</a>
    <a href="{{ route('admin.exam_results.trash') }}" class="btn btn-outline-secondary mb-3">🗑 Xem thùng rác</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Sinh viên</th>
                <th>Khóa học</th>
                <th>Loại bài thi</th>
                <th>Điểm</th>
                <th>Ngày thi</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($examResults as $result)
            <tr>
                <td>{{ $result->id }}</td>
                <td>{{ $result->student->full_name ?? '[Không có]' }}</td>
                <td>{{ $result->course->course_name ?? '[Không có]' }}</td>
                <td>{{ $result->exam_type }}</td>
                <td>{{ $result->score }}</td>
                <td>{{ $result->exam_date }}</td>
                <td>
                    @if($result->deleted_at)
                        <span class="text-danger">Đã xóa</span>
                    @else
                        <span class="text-success">Hoạt động</span>
                    @endif
                </td>
                <td>
                    
                        <a href="{{ route('admin.exam_results.show', $result->id) }}" class="btn btn-info btn-sm">Xem</a>
                        <a href="{{ route('admin.exam_results.edit', $result->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        
                        <form action="{{ route('admin.exam_results.destroy', $result->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xoá môn học này?')">Xoá mềm</button>
                        </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-end mt-3" >
    {{ $examResults->links('pagination::bootstrap-5') }}
</div>
@endsection
