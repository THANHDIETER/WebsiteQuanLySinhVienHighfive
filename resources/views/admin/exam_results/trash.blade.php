@extends('layouts.Adminlayout')

@section('content')
<div class="container mt-4">
    <h2>Danh sách kết quả thi đã xoá mềm</h2>

    <a href="{{ route('admin.exam_results.index') }}" class="btn btn-secondary mb-3">← Quay lại danh sách</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Sinh viên</th>
                <th>Khóa học</th>
                <th>Loại bài thi</th>
                <th>Điểm</th>
                <th>Ngày thi</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($examResults as $result)
                <tr>
                    <td>{{ $result->id }}</td>
                    <td>{{ $result->student->full_name ?? '[N/A]' }}</td>
                    <td>{{ $result->course->course_name ?? '[N/A]' }}</td>
                    <td>{{ $result->exam_type }}</td>
                    <td>{{ $result->score }}</td>
                    <td>{{ $result->exam_date }}</td>
                    <td>
                        <form action="{{ route('admin.exam-results.restore', $result->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button class="btn btn-success btn-sm">Khôi phục</button>
                        </form>

                        <form action="{{ route('admin.exam-results.forceDelete', $result->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc muốn xoá vĩnh viễn?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Xoá vĩnh viễn</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7">Không có bản ghi nào đã bị xoá mềm.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
