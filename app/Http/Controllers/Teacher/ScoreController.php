<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index()
    {
        return view('teacher.scores.index'); // Tạo view này ở resources/views/teacher/scores/index.blade.php
    }
}
