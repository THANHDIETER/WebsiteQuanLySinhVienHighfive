<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExamResult>
 */
class ExamResultFactory extends Factory
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
        'exam_type' => $this->faker->randomElement(['Midterm', 'Final', 'Quiz']),
        'score' => $this->faker->randomFloat(2, 0, 10),
        'exam_date' => $this->faker->date(),
    ];
}

}
