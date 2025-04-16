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
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    Student::factory(50)->create();
    Teacher::factory(50)->create();
    Course::factory(50)->create();

    // Sau khi đã có students, teachers, courses
    User::factory(50)->create(); // Nên gán role phù hợp sau nếu cần

    CourseTeacher::factory(50)->create();
    ClassSchedule::factory(50)->create();
    Enrollment::factory(50)->create();
    ExamResult::factory(50)->create();
    Notification::factory(50)->create();
    Attendance::factory(50)->create();
}

}
