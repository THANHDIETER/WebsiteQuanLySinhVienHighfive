<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherFactory> */
    use HasFactory;
   // app/Models/Teacher.php
public function classSchedules()
{
    // Giải thích: 'teacher_id' là khóa ngoại trong bảng 'class_schedules' trỏ về bảng 'teachers'
    return $this->hasMany(ClassSchedule::class, 'teacher_id'); 
}
}
