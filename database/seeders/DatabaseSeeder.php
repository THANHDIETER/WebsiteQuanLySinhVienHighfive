<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\ClassSchedule;
use App\Models\Course;
use App\Models\CourseTeacher;
use App\Models\Enrollment;
use App\Models\ExamResult;
use App\Models\Notification;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; // Thêm dòng này

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Đảm bảo đã tạo các role trước khi gán cho user
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $teacherRole = Role::firstOrCreate(['name' => 'teacher']);
        $studentRole = Role::firstOrCreate(['name' => 'student']);

        // Tạo students, teachers, courses
        Student::factory(20)->create();
        Teacher::factory(20)->create();
        Course::factory(20)->create();

        // Sau khi tạo users, gán roles cho họ
        $users = User::factory(20)->create();

        foreach ($users as $index => $user) {
            if ($index < 5) {
                $user->assignRole($adminRole); // Gán 5 người đầu tiên là admin
            } elseif ($index < 15) {
                $user->assignRole($teacherRole); // Gán 10 người tiếp theo là teacher
            } else {
                $user->assignRole($studentRole); // Gán 5 người còn lại là student
            }
        }

        // Tiến hành tạo các liên kết giữa các bảng
        CourseTeacher::factory(20)->create();
        ClassSchedule::factory(20)->create();
        Enrollment::factory(20)->create();
        ExamResult::factory(20)->create();
        Notification::factory(20)->create();
        Attendance::factory(20)->create();
        $this->call(RoleSeeder::class);

    }
}
