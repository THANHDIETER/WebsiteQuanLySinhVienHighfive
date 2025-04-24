<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class StudentNotificationController extends Controller
{
    //
    public function index(Request $request)
    {
        $studentCode = $request->input('student_code');
        $user = null;
        $courses = collect();
        $notifications = collect();

        if ($studentCode) {
            $user = User::where('student_code', $studentCode)->first();
            if ($user) {
                $courses = $user->courses;
                // Lấy thông báo: công khai, liên quan đến khóa học của user, hoặc dành riêng cho user
                $notifications = Notification::where(function ($query) use ($user, $courses) {
                    $query->where('is_public', true)
                          ->orWhereIn('course_id', $courses->pluck('id'))
                          ->orWhere('user_id', $user->id);
                })
                ->whereNotNull('published_at')
                ->orderBy('published_at', 'desc')
                ->get();
            }
        }

        return view('student.notifications.index', compact('user', 'courses', 'notifications', 'studentCode'));
    }
}
