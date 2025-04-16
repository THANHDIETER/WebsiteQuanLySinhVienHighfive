<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_code' => strtoupper('CS' . $this->faker->unique()->numerify('###')),
            'course_name' => $this->faker->words(3, true),
            'credits' => $this->faker->numberBetween(1, 4),
            'description' => $this->faker->paragraph,
        ];
    }

}
