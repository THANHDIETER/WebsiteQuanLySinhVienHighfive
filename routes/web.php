<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ExamResultController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClassScheduleController;
use App\Http\Controllers\CourseTeacherController;
use App\Http\Controllers\Teacher\ScoreController;
use App\Http\Controllers\Teacher\ScheduleController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Student\StudentCourseController;
use App\Http\Controllers\Student\StudentResultController;
use App\Http\Controllers\Student\StudentProfileController;
use App\Http\Controllers\Teacher\TeacherProfileController;
use App\Http\Controllers\Student\StudentScheduleController;
use App\Http\Controllers\Student\StudentAttendanceController;
use App\Http\Controllers\Student\StudentNotificationController;
use App\Http\Controllers\Teacher\TeacherNotificationController;
use App\Http\Controllers\Student\DashboardController as StudentDashboard;
use App\Http\Controllers\Teacher\DashboardController as TeacherDashboard;

// Authentication routes
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Admin routes here
    // Admin route group
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('attendances', AttendanceController::class);
    Route::resource('course-teachers', CourseTeacherController::class);
    Route::resource('enrollments', EnrollmentController::class);
    Route::resource('notifications', NotificationController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('users', UserController::class);

    // Students management
    Route::prefix('students')->name('students.')->group(function () {
        Route::get('/', [StudentController::class, 'index'])->name('index');
        Route::get('/create', [StudentController::class, 'create'])->name('create');
        Route::post('/store', [StudentController::class, 'store'])->name('store');
        Route::get('/{id}/showedit', [StudentController::class, 'showedit'])->name('showedit');
        Route::put('/{id}/update', [StudentController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [StudentController::class, 'destroy'])->name('destroy');
        Route::get('/trash', [StudentController::class, 'trash'])->name('trash');
        Route::post('/{id}/restore', [StudentController::class, 'restore'])->name('restore');
    });

    // Class schedules
    Route::prefix('class-schedules')->name('class_schedules.')->group(function () {
        Route::get('/', [ClassScheduleController::class, 'index'])->name('index');
        Route::get('/create', [ClassScheduleController::class, 'create'])->name('create');
        Route::post('/store', [ClassScheduleController::class, 'store'])->name('store');
        Route::get('/{id}/showedit', [ClassScheduleController::class, 'showedit'])->name('showedit');
        Route::put('/{id}/update', [ClassScheduleController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [ClassScheduleController::class, 'destroy'])->name('destroy');
        Route::get('/trash', [ClassScheduleController::class, 'trash'])->name('trash');
        Route::post('/{id}/restore', [ClassScheduleController::class, 'restore'])->name('restore');
    });

    // Courses
    Route::prefix('courses')->name('courses.')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('index');
        Route::get('/create', [CourseController::class, 'create'])->name('create');
        Route::post('/store', [CourseController::class, 'store'])->name('store');
        Route::get('/show/{id}', [CourseController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CourseController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [CourseController::class, 'destroy'])->name('destroy');
        Route::get('trash', [CourseController::class, 'trash'])->name('trash');
        Route::post('{id}/restore', [CourseController::class, 'restore'])->name('restore');
        Route::delete('{id}/force-delete', [CourseController::class, 'forceDelete'])->name('forceDelete');
    });

    // Exam Results
    Route::prefix('exam_results')->name('exam_results.')->group(function () {
        Route::get('/', [ExamResultController::class, 'index'])->name('index');
        Route::get('/create', [ExamResultController::class, 'create'])->name('create');
        Route::post('/store', [ExamResultController::class, 'store'])->name('store');
        Route::get('/show/{id}', [ExamResultController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [ExamResultController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ExamResultController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ExamResultController::class, 'destroy'])->name('destroy');
        Route::get('trash', [ExamResultController::class, 'trash'])->name('trash');
        Route::post('/{id}/restore', [ExamResultController::class, 'restore'])->name('restore');
        Route::delete('{id}/force-delete', [ExamResultController::class, 'forceDelete'])->name('forceDelete');
    });
});
});
// General dashboards (adjust if needed)
// Route::get('/admin/dashboard', fn() => 'Admin Dashboard')->name('admin.dashboard');
// Route::get('/teacher/dashboard', fn() => 'Teacher Dashboard')->name('teacher.dashboard');
// Route::get('/student/dashboard', fn() => 'Student Dashboard')->name('student.dashboard');



// Teacher routes
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', [TeacherDashboard::class, 'index'])->name('dashboard');
    Route::get('/courses', [CourseController::class, 'index'])->name('courses');
    Route::get('/students', [StudentController::class, 'index'])->name('students');
    Route::get('/scores', [ScoreController::class, 'index'])->name('scores');
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule');
    Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendance');
    Route::get('/profile', [TeacherProfileController::class, 'index'])->name('profile');
    Route::get('/notifications', [TeacherNotificationController::class, 'index'])->name('notifications');
    // Add teacher-specific routes here
});

// Student routes
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentDashboard::class, 'index'])->name('dashboard');
    Route::get('/courses', [StudentCourseController::class, 'index'])->name('courses');
    // Route::post('/courses/register', [StudentCourseController::class, 'register'])->name('courses.register');
        // Route::get('/courses/results', [StudentCourseController::class, 'results'])->name('courses.results');
    Route::get('/results', [StudentResultController::class, 'index'])->name('results'); 
    Route::get('/schedule', [StudentScheduleController::class, 'index'])->name('schedule');
    Route::get('/attendances', [StudentAttendanceController::class, 'index'])->name('attendance'); // bỏ chữ "s"
    Route::get('/profile', [StudentProfileController::class, 'index'])->name('profile');
    Route::get('/notifications', [StudentNotificationController::class, 'index'])->name('notifications');
   

});
Route::get('/error', function () {
    return view('error');  // You can create an 'error.blade.php' file in the resources/views folder
})->name('errorPage');
