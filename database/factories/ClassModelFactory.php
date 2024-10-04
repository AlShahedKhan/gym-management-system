<?php

namespace Database\Factories;

use App\Models\Trainer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassModel>
 */
class ClassModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'trainer_id' => Trainer::factory(), // Generate or link a Trainer instance
            'class_time' => $this->faker->dateTime(), // Random date and time
            'capacity' => $this->faker->numberBetween(10, 30), // Random capacity between 10 and 30
        ];
    }
}
