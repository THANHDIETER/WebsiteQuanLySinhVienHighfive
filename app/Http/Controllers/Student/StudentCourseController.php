<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class StudentCourseController extends Controller
{
    public function index()
    {
        return view('student.courses.index'); // tạo view này để tránh lỗi tiếp theo
    }
}
