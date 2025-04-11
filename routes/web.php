<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassScheduleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseTeacherController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ExamResultController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;

// Trang test hoặc welcome
Route::get('/', function () {
    return view('test');
});

// Trang admin dashboard
Route::get('/admin-home', [HomeController::class, 'index'])->name('admin.dashboard');

// Admin route group
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Student CRUD
    Route::resource('students', StudentController::class);

    // Attendance
    Route::resource('attendances', AttendanceController::class);

    // Class Schedule
    Route::resource('class-schedules', ClassScheduleController::class);

    // Course
    Route::resource('courses', CourseController::class);

    // Course Teacher
    Route::resource('course-teachers', CourseTeacherController::class);

    // Enrollment
    Route::resource('enrollments', EnrollmentController::class);

    // Exam Result
    Route::resource('exam-results', ExamResultController::class);

    // Notification
    Route::resource('notifications', NotificationController::class);

    // Teacher
    Route::resource('teachers', TeacherController::class);

    // User
    Route::resource('users', UserController::class);
});
