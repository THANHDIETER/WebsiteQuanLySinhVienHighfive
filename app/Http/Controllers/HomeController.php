<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\ClassSchedule;
use App\Models\Enrollment;
use App\Models\ExamResult;
use App\Models\Notification;
use App\Models\CourseTeacher;
use App\Models\Attendance;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home', [
            'studentsCount'        => Student::count(),
            'teachersCount'        => Teacher::count(),
            'coursesCount'         => Course::count(),
            'classesCount'         => ClassSchedule::count(),
            'enrollmentsCount'     => Enrollment::count(),
            'examResultsCount'     => ExamResult::count(),
            'schedulesCount'       => ClassSchedule::count(),
            'notificationsCount'   => Notification::count(),
            'courseTeachersCount'  => CourseTeacher::count(),
            'attendancesCount'     => Attendance::count(),
            'subjectsCount' => Course::count(), // Dùng course là môn học

        ]);
    }
}
