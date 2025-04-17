<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherFactory> */
    use HasFactory;
    protected $fillable = [
        'teacher_code',
        'full_name',
        'email',
        'phone',
        'department',
    ];
   // app/Models/Teacher.php
public function classSchedules()
{
    // Giải thích: 'teacher_id' là khóa ngoại trong bảng 'class_schedules' trỏ về bảng 'teachers'
    return $this->hasMany(ClassSchedule::class, 'teacher_id'); 
}
 // Quan hệ nhiều-nhiều với Course
 public function courses()
 {
     return $this->belongsToMany(Course::class, 'course_teachers', 'teacher_id', 'course_id');
 }
}
