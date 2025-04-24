<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class StudentResultController extends Controller
{
    public function index()
    {
        return view('student.results.index'); // tạo view tương ứng
    }
}
