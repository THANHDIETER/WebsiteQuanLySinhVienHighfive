<?php

namespace App\Http\Controllers\Student;

use App\Models\Course;
use App\Http\Controllers\Controller;

class StudentCourseController extends Controller
{
    // public function index()
    // {
    //     $courses = Course::with(['teacher', 'examResults']) // Lấy cả thông tin kết quả thi
    //         ->orderBy('created_at', 'desc')
    //         ->get();
    //     return view('student.courses.index', compact('courses'));
    //     // return view('student.courses.index'); // tạo view này để tránh lỗi tiếp theo
    // }
    public function index()
    {
        $courses = Course::with(['teacher', 'classSchedules'])->get();
        // return response()->json($courses);
        return view('student.courses.index', compact('courses'));

    }
    
}
