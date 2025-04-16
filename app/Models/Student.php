<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_code',
        'full_name',
        'gender',
        'date_of_birth',
        'email',
        'phone',
        'address',
    ];

    // Định nghĩa tên bảng nếu không theo quy tắc mặc định
    protected $table = 'students';
}
