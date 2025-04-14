<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'teacher_code' => 'GV' . $this->faker->unique()->numerify('###'),
            'full_name'    => $this->faker->name(),
            'email'        => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->regexify('0[0-9]{9}'), // đúng định dạng 10 chữ số bắt đầu bằng 0

            'department'   => $this->faker->randomElement([
                'Công nghệ thông tin',
                'Kế toán',
                'Kỹ thuật điện',
                'Khoa học dữ liệu',
                'Quản trị kinh doanh',
            ]),
        ];
    }


}
