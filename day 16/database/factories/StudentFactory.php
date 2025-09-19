<?php

namespace Database\Factories;

use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'    => $this->faker->name(),
            'email'   => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'gender'  => $this->faker->randomElement(['male', 'female']),
            'age'     => $this->faker->numberBetween(18, 35),
            'image'   => 'assets/images/default-student.png',
            'track_id'=> Track::factory(), // كل طالب مرتبط بـ Track
        ];
    }
}
