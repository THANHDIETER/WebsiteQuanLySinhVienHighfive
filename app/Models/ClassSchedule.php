<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassSchedule extends Model
{
    /** @use HasFactory<\Database\Factories\ClassScheduleFactory> */
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'course_id',
        'teacher_id',
        'room',
        'day_of_week',
        'start_time',
        'end_time',
    ];
      // Định nghĩa quan hệ với Course (mỗi lịch học thuộc về một khóa học)
      public function course()
      {
          return $this->belongsTo(Course::class, 'course_id');  // 'course_id' là khóa ngoại trong bảng 'class_schedules'
      }
     // Định nghĩa quan hệ giữa ClassSchedule và Teacher
     public function teacher()
     {
         return $this->belongsTo(Teacher::class, 'teacher_id');  // Sử dụng 'teacher_id' làm khóa ngoại
     }
}
