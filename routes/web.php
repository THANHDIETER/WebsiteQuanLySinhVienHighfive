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

// Admin route group
Route::prefix('admin')->name('admin.')->group(function () {
    // Trang admin dashboard
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    // quản lý sinh viên
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

    // Attendance
    Route::resource('attendances', AttendanceController::class);

    // Class Schedule
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

    // Course
    Route::prefix('courses')->name('courses.')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('index'); // Danh sách khóa học
        Route::get('/create', [CourseController::class, 'create'])->name('create'); // Form tạo mới
        Route::post('/store', [CourseController::class, 'store'])->name('store'); // Lưu khóa học mới

        Route::get('/show/{id}', [CourseController::class, 'show'])->name('show'); // Xem chi tiết
        Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('edit'); // Form chỉnh sửa
        Route::put('/update/{id}', [CourseController::class, 'update'])->name('update'); // Cập nhật
        Route::delete('/delete/{id}', [CourseController::class, 'destroy'])->name('destroy'); // Xóa
        Route::get('trash', [CourseController::class, 'trash'])->name('trash');
        Route::post('{id}/restore', [CourseController::class, 'restore'])->name('restore');
        Route::delete('{id}/force-delete', [CourseController::class, 'forceDelete'])->name('forceDelete');
    });

    // Course Teacher
    Route::resource('course-teachers', CourseTeacherController::class);

    // Enrollment
    Route::resource('enrollments', EnrollmentController::class);

    // Exam Result
    Route::prefix('exam_results')->name('exam_results.')->group(function () {
        Route::get('/', [ExamResultController::class, 'index'])->name('index'); // Danh sách điểm thi
        Route::get('/create', [ExamResultController::class, 'create'])->name('create'); // Form tạo mới
        Route::post('/store', [ExamResultController::class, 'store'])->name('store'); // Lưu kết quả mới

        Route::get('/show/{id}', [ExamResultController::class, 'show'])->name('show'); // Xem chi tiết
        Route::get('/edit/{id}', [ExamResultController::class, 'edit'])->name('edit'); // Form chỉnh sửa
        Route::put('/update/{id}', [ExamResultController::class, 'update'])->name('update'); // Cập nhật
        Route::delete('/delete/{id}', [ExamResultController::class, 'destroy'])->name('destroy'); // Xóa mềm

        Route::get('trash', [CourseController::class, 'trash'])->name('trash');

        Route::post('/{id}/restore', [ExamResultController::class, 'restore'])->name('restore');
        Route::delete('{id}/force-delete', [ExamResultController::class, 'forceDelete'])->name('forceDelete');
    });

    // Notification
    Route::resource('notifications', NotificationController::class);

    // Teacher
    Route::resource('teachers', TeacherController::class);

    // User
    Route::resource('users', UserController::class);
});
