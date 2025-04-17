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

    // Quan hệ nhiều-nhiều với Course
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_teachers', 'teacher_id', 'course_id');
    }
}
