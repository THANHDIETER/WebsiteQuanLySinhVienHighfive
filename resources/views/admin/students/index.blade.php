@extends('layouts.Adminlayout')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Danh sách sinh viên</h1>

        <a href="{{ route('admin.students.create') }}" class="btn btn-primary mb-3">Thêm sinh viên mới</a>
        <a href="{{ route('admin.students.trash') }}" class="btn btn-warning mb-3">Danh sách sinh viên chặn</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <!-- Đặt bảng trong container có thể cuộn ngang -->
                <div class="table-responsive">
                    <table class="table table-striped">
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
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->student_code }}</td>
                                    <td>{{ $student->full_name }}</td>
                                    <td>
                                        @if ($student->gender === 'Male')
                                            Nam
                                        @elseif ($student->gender === 'Female')
                                            Nữ
                                        @else
                                            Khác
                                        @endif
                                    </td>                                    
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{ $student->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.students.showedit', $student->id) }}"
                                               class="btn btn-warning btn-sm w-50 text-center">Sửa</a>
                                        
                                            <form action="{{ route('admin.students.destroy', $student->id) }}"
                                                  method="POST" class="w-50">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-danger btn-sm w-100"
                                                        onclick="return confirm('Bạn có chắc chắn muốn chặn học sinh này không?')">
                                                    Chặn
                                                </button>
                                            </form>
                                        </div>
                                                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Phân trang -->
                <div class="d-flex justify-content-end mt-3">
                    {{ $students->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
