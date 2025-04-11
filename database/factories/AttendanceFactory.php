<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => \App\Models\Student::inRandomOrder()->first()?->id ?? 1,
            'course_id' => \App\Models\Course::inRandomOrder()->first()?->id ?? 1,
            'attendance_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['Present', 'Absent', 'Late']),
        ];
    }

}
