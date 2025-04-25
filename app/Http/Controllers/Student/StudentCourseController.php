<?php

namespace App\Http\Controllers\Student;

use App\Models\Course;
use App\Http\Controllers\Controller;

class StudentCourseController extends Controller
{
    public function index()
    {
        $courses = Course::with(['teacher', 'classSchedules'])->get();
        // return response()->json($courses);
        return view('student.courses.index', compact('courses'));

    }
}
