@extends('layouts.Adminlayout')

@section('content')
<div class="container mt-4">
    <h2>Danh sách lịch học</h2>
    <a href="{{ route('admin.class_schedules.create') }}" class="btn btn-success mb-3">Thêm mới</a>
    <a href="{{ route('admin.class_schedules.trash') }}" class="btn btn-warning mb-3">Lớp bị ẩn</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Khóa học</th>
                <th>Giáo viên</th>
                <th>Phòng</th>
                <th>Thứ</th>
                <th>Giờ bắt đầu</th>
                <th>Giờ kết thúc</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $item)
            <tr>
                <td>{{ $item->course->course_name }}</td>
                <td>{{ $item->teacher->full_name }}</td>
                <td>{{ $item->room }}</td>
                <td>{{ $item->day_of_week }}</td>
                <td>{{ \Carbon\Carbon::parse($item->start_time)->format('h:i A') }}</td>
                <td>{{ \Carbon\Carbon::parse($item->end_time)->format('h:i A') }}</td>          
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.class_schedules.showedit', $item->id) }}" class="btn btn-primary btn-sm w-50 text-center">Sửa</a>
                        
                        <form action="{{ route('admin.class_schedules.destroy', $item->id) }}" method="POST" class="w-50">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm w-100" onclick="return confirm('Xác nhận ẩn?')">ẨN</button>
                        </form>
                    </div>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end mt-3">
        {{ $schedules->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
