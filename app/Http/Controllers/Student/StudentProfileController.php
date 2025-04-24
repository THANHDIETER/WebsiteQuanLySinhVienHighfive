<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentProfileController extends Controller
{
    //
    public function index(Request $request)
    {
        $studentCode = $request->input('student_code');
        $user = null;
        $courses = collect();

        if ($studentCode) {
            $user = User::where('student_code', $studentCode)->first();
            if ($user) {
                $courses = $user->courses;
            }
        }

        return view('student.profile.index', compact('user', 'courses', 'studentCode'));
    }
}
