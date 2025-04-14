<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'student_code' => 'SV' . $this->faker->unique()->numerify('#####'), // SV00000 đến SV99999

        'full_name' => $this->faker->name(),
        'gender' => $this->faker->randomElement(['Male', 'Female']),
        'date_of_birth' => $this->faker->date(),
        'email' => $this->faker->unique()->safeEmail(),
        'phone' => $this->faker->regexify('0[0-9]{9}'),
        'address' => $this->faker->address,
    ];
}


}
