<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentAttendanceController extends Controller
{
    //
    public function index(Request $request){
        // $courses = Course::with(['teacher', 'classSchedules'])->get();
        // // return response()->json($courses);
        // return view('student.attendance.index', compact('courses'));
        $studentCode = $request->input('student_code');
        $user = null;
        $courses = collect();

        if ($studentCode) {
            $user = User::where('student_code', $studentCode)->first();
            if ($user) {
                $courses = $user->courses;
            }
        }

        // return view('attendances.index', compact('user', 'courses', 'studentCode'));

        return view('student.attendance.index', compact('user', 'courses', 'studentCode'));
    }
}
