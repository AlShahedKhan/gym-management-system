<?php

namespace Database\Factories;

use App\Models\Trainer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'trainer_id' => Trainer::factory(), // Link to a Trainer model
            'class_time' => $this->faker->dateTime(),
            'capacity' => $this->faker->numberBetween(10, 30),
        ];
    }
}
