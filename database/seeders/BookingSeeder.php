<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\User; // Assuming User is the model for trainees
use App\Models\ClassModel;
use App\Models\Role;

class BookingSeeder extends Seeder
{
    public function run()
    {
        // Fetch the "trainee" role
        $traineeRole = Role::where('name', 'trainee')->first();

        // Fetch all users who have the "trainee" role
        $trainees = User::where('role_id', $traineeRole->id)->get();

        // Fetch all existing classes
        $classes = ClassModel::all();

        // Create bookings
        foreach ($trainees as $trainee) {
            // Randomly book classes for each trainee
            foreach ($classes->random(3) as $class) {
                Booking::create([
                    'trainee_id' => $trainee->id,
                    'class_id' => $class->id,
                    'booking_time' => now(),
                ]);
            }
        }
    }
}
