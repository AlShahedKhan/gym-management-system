<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainee_id')->constrained('users')->onDelete('cascade'); // Trainee booking the class
            $table->foreignId('class_id')->constrained('classes')->onDelete('cascade'); // The class being booked
            $table->dateTime('booking_time'); // Time when the booking was made
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}

