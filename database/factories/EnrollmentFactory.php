<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
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
            'enrollment_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'grade' => $this->faker->randomFloat(2, 0, 10),
            'status' => $this->faker->randomElement(['Enrolled', 'Completed', 'Dropped']),
        ];
    }

}
