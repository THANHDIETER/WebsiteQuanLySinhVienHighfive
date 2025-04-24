<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'student_id');  // Giả sử bạn có bảng schedules và cột student_id
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');  // Liên kết tới bảng users qua user_id
    }
}
