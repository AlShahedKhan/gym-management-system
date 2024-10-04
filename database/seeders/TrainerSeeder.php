<?php

namespace Database\Seeders;

use App\Models\Trainer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Make sure there are users in the database before linking trainers to them
        // You can either create users via the UserSeeder or use factory here

        // Example: Manually create trainers linked to existing users
        // Make sure you have users in your 'users' table

        $users = User::all(); // Fetch all users (ensure that the users table is populated)

        foreach ($users as $user) {
            // Create a trainer for each user
            Trainer::create([
                'user_id' => $user->id,
                'expertise' => 'Fitness Coaching', // Assign an expertise (can be randomized)
                'availability' => 'Monday to Friday, 9AM to 5PM', // Sample availability
            ]);
        }

        // Alternatively, you could use factories if you'd like to generate random data
        // Trainer::factory()->count(10)->create(); // If you have TrainerFactory created
    }
}
