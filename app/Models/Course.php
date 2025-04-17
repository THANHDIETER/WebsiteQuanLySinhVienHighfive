<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory,SoftDeletes;

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

    // public function teacher()
    // {
    //     return $this->belongsToMany(Teacher::class, 'course_teachers', 'course_id', 'teacher_id');
    // }
    // App\Models\Course.php
public function teacher()
{
    return $this->belongsTo(Teacher::class, 'teacher_id');
}

}
