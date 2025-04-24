<?php
// app/Http/Controllers/Student/DashboardController.php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Lấy người dùng hiện tại
        $user = auth()->user();

        // Lấy thông tin sinh viên từ người dùng
        $student = $user->student;  // Truy vấn thông tin sinh viên gắn liền với người dùng

        if ($student) {
            // Lấy lịch học và thông báo nếu có thông tin sinh viên
            $upcomingSchedules = $student->schedules()->upcoming()->get();  // Giả sử bạn đã có quan hệ schedules trong Student
        } else {
            $upcomingSchedules = collect();  // Nếu không có sinh viên, trả về mảng rỗng
        }

        // Lấy thông báo của người dùng
        $notifications = $user->notifications()->latest()->limit(5)->get();  // Lấy thông báo gần nhất của người dùng

        return view('student.dashboard', compact('student', 'upcomingSchedules', 'notifications'));
    }
}
