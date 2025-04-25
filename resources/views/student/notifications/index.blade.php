@extends('layouts.app')




@section('content')
<div class="container">
    <h1>Thông báo</h1>

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
        <h3 class="mt-3">Thông báo</h3>
        {{-- @if($courses->isEmpty())
            <p>Bạn chưa đăng ký khóa học nào.</p>
        @else --}}
            {{-- <h4>Các khóa học đã đăng ký</h4>
            <ul>
                @foreach($courses as $course)
                    <li>{{ $course->name }}</li>
                @endforeach
            </ul>
        @endif --}}

        @if($notifications->isEmpty())
            <p>Chưa có thông báo nào.</p>
        @else
            @foreach($notifications as $notification)
                <div class="notification">
                    <h4>{{ $notification->title }}</h4>
                    <p>{{ $notification->content }}</p>
                    @if($notification->course)
                        <p><strong>Khóa học:</strong> {{ $notification->course->name }}</p>
                    @endif
                    <p class="date">Công bố: {{ $notification->published_at->format('d/m/Y H:i') }}</p>
                </div>
            @endforeach
        @endif
    {{-- @endif --}}
</div>
@endsection 