<?php

namespace Database\Factories;

use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'       => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'duration'    => $this->faker->randomElement(['2 weeks', '1 month', '3 months']),
            'track_id'    => Track::factory(), // كل كورس مرتبط بـ Track
        ];
    }
}
