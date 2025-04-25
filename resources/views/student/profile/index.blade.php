@extends('layouts.app')



@section('content')
<div class="container">
    <h1>Thông tin cá nhân</h1>

    <!-- Form nhập mã học viên -->
    <form method="POST" action="">
        @csrf
        <div class="form-group">
            <label for="student_code">Nhập mã học viên:</label>
            <input type="text" name="student_code" id="student_code" class="form-control" value="{{ old('student_code', $studentCode) }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Tra cứu</button>
    </form>

    {{-- @if($studentCode && !$user)
        <p class="mt-3 text-danger">Không tìm thấy học viên với mã {{ $studentCode }}.</p>
    @elseif($studentCode) --}}
        <div class="profile-info mt-3">
            <h4>Thông tin cá nhân</h4>
            @if($user)
                <p><strong>Họ tên:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Mã học viên:</strong> {{ $user->student_code }}</p>
            @else
                <p>thông tin cá nhân chưa xác minh.</p>
                <p><strong>Họ tên:</strong> ....</p>
                <p><strong>Email:</strong> ....</p>
                <p><strong>Mã học viên:</strong> ....</p>
            @endif
        </div>

        <div class="course-list">
            <h4>Các khóa học đã đăng ký</h4>
            @if($courses->isEmpty())
                <p>Bạn chưa đăng ký khóa học nào.</p>
            @else
                <ul>
                    @foreach($courses as $course)
                        <li>{{ $course->name }} - {{ $course->description }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    {{-- @endif --}}
</div>
@endsection 