@extends('layouts.Adminlayout')

@section('content')
<div class="container mt-4">
    <h2>Danh sách lớp học đã bị ẩn (Thùng rác)</h2>
    <a href="{{ route('admin.class_schedules.index') }}" class="btn btn-primary mb-3">Quay lại danh sách</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Khóa học</th>
                <th>Giáo viên</th>
                <th>Phòng</th>
                <th>Thứ</th>
                <th>Giờ bắt đầu</th>
                <th>Giờ kết thúc</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @forelse($schedules as $item)
                <tr>
                    <td>{{ $item->course->course_name ?? '[Đã xoá]' }}</td>
                    <td>{{ $item->teacher->full_name ?? '[Đã xoá]' }}</td>
                    <td>{{ $item->room }}</td>
                    <td>{{ $item->day_of_week }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->start_time)->format('h:i A') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->end_time)->format('h:i A') }}</td>
                    <td>
                        <form action="{{ route('admin.class_schedules.restore', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Khôi phục</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Không có lớp học nào bị ẩn.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-end mt-3">
        {{ $schedules->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
