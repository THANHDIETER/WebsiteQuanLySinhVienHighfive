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
            'course_code' => 'CS' . $this->faker->unique()->numerify('###'),  // Sử dụng unique() để đảm bảo không trùng lặp
            'course_name' => $this->faker->sentence,
            'credits' => $this->faker->numberBetween(1, 5),
            'description' => $this->faker->paragraph,
        ];
    }

}
