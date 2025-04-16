<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassScheduleController;

Route::prefix('admin')->name('admin.')->group(function () {
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
    // quản lý lớp học
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
});

