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
            'course_name' => fake()->word(),
            'course_code' => 'CSE '.fake()->numberBetween(101, 999),
            'student_id' => fake()->numberBetween(1, 100), // Assuming student IDs are between 1 and 100
        ];
    }
}
