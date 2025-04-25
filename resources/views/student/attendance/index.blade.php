@extends('layouts.app')




@section('content')
<div class="container">
    <h1>Điểm danh</h1>

    <!-- Form nhập mã học viên -->
    {{-- <form method="POST" action="">
        @csrf
        <div class="form-group">
            <label for="student_code">Nhập mã học viên:</label>
            <input type="text" name="student_code" id="student_code" class="form-control" value="{{ old('student_code', $studentCode) }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Tra cứu</button>
    </form> --}}

    {{-- @if($studentCode && !$user)
        <p class="mt-3 text-danger">Không tìm thấy học viên với mã {{ $studentCode }}.</p>
    @elseif($studentCode) --}}
        <h3 class="mt-3">Thông tin điểm danh</h3>
        {{-- @if($courses->isEmpty())
            <p>Bạn chưa đăng ký khóa học nào.</p>
        @else --}}
            {{-- <h4>Các khóa học đã đăng ký</h4>
            <ul>
                @foreach($courses as $course)
                    <li>{{ $course->name }}</li>
                @endforeach
            </ul>
        @endif

        @if($user && $user->attendances->isEmpty())
            <p>Chưa có thông tin điểm danh.</p>
        @endif --}}
        <div id="calendar"></div>
    {{-- @endif --}}
    
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        if (calendarEl) {
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    @if($user)
                        @foreach($user->attendances as $attendance)
                            {
                                title: '{{ $attendance->course->name }} - {{ $attendance->status == 'present' ? 'Có mặt' : 'Vắng mặt' }}',
                                start: '{{ $attendance->attendance_date }}',
                                color: '{{ $attendance->status == 'present' ? 'green' : 'red' }}'
                            },
                        @endforeach
                    @endif
                ],
                locale: 'vi',
                eventClick: function(info) {
                    alert('Khóa học: ' + info.event.title + '\nNgày: ' + info.event.start.toLocaleDateString());
                }
            });
            calendar.render();
        }
    });
</script>
@endsection 