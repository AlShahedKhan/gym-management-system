<?php

namespace Database\Factories;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'trainee_id' => User::factory(), // Link to a User model with "trainee" role
            'class_id' => ClassModel::factory(), // Link to a Class model
            'booking_time' => $this->faker->dateTime(),
        ];
    }
}
