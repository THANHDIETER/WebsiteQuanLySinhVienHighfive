<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // 👈 Thêm dòng này

class Teacher extends Model
{
    use HasFactory; // 👈 Thêm dòng này

    protected $fillable = [
        'teacher_code',
        'full_name',
        'email',
        'phone',
        'department',
    ];
}
