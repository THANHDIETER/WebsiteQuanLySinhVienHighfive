<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory,SoftDeletes;
    // Định nghĩa quan hệ ngược lại: Một khóa học có thể có nhiều lịch học
    // app/Models/Course.php
    public function classSchedules()
    {
        // Giải thích: 'course_id' là khóa ngoại trong bảng 'class_schedules' trỏ về bảng 'courses'
        return $this->hasMany(ClassSchedule::class, 'course_id');
    }
    protected $fillable = [
        'course_code',
        'course_name',
        'credits',
        'description',
        'teacher_id'
    ];
    protected $datess = ['deleted_at'];

    public function examResults()
    {
        return $this->hasMany(ExamResult::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
