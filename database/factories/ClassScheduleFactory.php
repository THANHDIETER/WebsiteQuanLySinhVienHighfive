<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassSchedule>
 */
class ClassScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id' => \App\Models\Course::inRandomOrder()->first()?->id ?? 1,
            'teacher_id' => \App\Models\Teacher::inRandomOrder()->first()?->id ?? 1,
            'room' => 'Room ' . $this->faker->numberBetween(101, 120),
            'day_of_week' => $this->faker->dayOfWeek,
            'start_time' => '08:00:00',
            'end_time' => '10:00:00',
        ];
    }
    
}
