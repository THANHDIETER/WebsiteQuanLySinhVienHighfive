<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('teacher.dashboard.index'); // hoặc view bạn muốn
    }
}
