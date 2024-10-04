<?php

namespace Database\Seeders;

use App\Models\ClassModel;
use App\Models\Trainer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch all existing trainers to assign them to classes
        $trainers = Trainer::all();

        foreach ($trainers as $trainer) {
            // Create 3 random classes for each trainer
            for ($i = 0; $i < 3; $i++) {
                ClassModel::create([
                    'trainer_id' => $trainer->id, // Link to the trainer
                    'class_time' => now()->addDays($i), // Set class time to i-th day from now
                    'capacity' => rand(10, 30), // Random capacity between 10 and 30
                ]);
            }
        }

        // Alternatively, you could use a factory to generate random data
        // ClassModel::factory()->count(10)->create(); // If you have ClassModelFactory created
    }
}
