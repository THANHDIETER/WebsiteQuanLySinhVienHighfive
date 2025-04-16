<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;
     // Định nghĩa quan hệ ngược lại: Một khóa học có thể có nhiều lịch học
    // app/Models/Course.php
public function classSchedules()
{
    // Giải thích: 'course_id' là khóa ngoại trong bảng 'class_schedules' trỏ về bảng 'courses'
    return $this->hasMany(ClassSchedule::class, 'course_id');
}

}
