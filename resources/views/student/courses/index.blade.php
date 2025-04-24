@extends('layouts.app')


@section('title', 'Danh Sách Khóa Học')

@section('content')
    <h1 class="text-center mb-4">Danh Sách Khóa Học</h1>
    <div class="row">
        @forelse ($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card course-card">
                    <img src="https://img.lovepik.com/background/20211021/large/lovepik-abstract-line-background-of-science-and-technology-image_400133833.jpg" class="card-img-top" alt="{{ $course->course_name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->course_name }}</h5>
                        <p class="card-text"><strong>Mã khóa học:</strong> {{ $course->course_code }}</p>
                        <p class="card-text">{{ $course->description ?? 'Không có mô tả' }}</p>
                        <p class="card-text"><strong>Số tín chỉ:</strong> {{ $course->credits }}</p>
                        <p class="card-text">
                            <strong>Giảng viên:</strong> 
                            {{ $course->teacher->name ?? 'giảng viên(ẩn)' }}
                        </p>
                        <p class="card-text">
                            <strong>Lịch học:</strong> 
                            {{$randomNumber = mt_rand(1, 6);}}
                            {{-- {{ $course->schedules->map(fn($s) => "{$s->day_of_week} ({$s->start_time} - {$s->end_time}, {$s->room})")->join('; ') ?: 'Chưa có' }} --}}
                        </p>
                        <a href="" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
           
        @empty
            <div class="col-12 text-center">
                <p>Chưa có khóa học nào.</p>
            </div>
        @endforelse
    </div>
   
@endsection 
