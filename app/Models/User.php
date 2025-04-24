<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory; // 👈 Thêm dòng này

class User extends Authenticatable
{
    use HasFactory, HasRoles, HasApiTokens, Notifiable; // 👈 Thêm HasFactory vào đây

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function student()
    {
        return $this->hasOne(Student::class, 'user_id');  // Liên kết tới bảng students qua user_id
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id');  // Liên kết tới bảng notifications qua user_id
    }
}
