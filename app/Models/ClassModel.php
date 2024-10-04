<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    // Specify the correct table name
    protected $table = 'classes';

    protected $fillable = ['trainer_id', 'class_time', 'capacity'];

    // Relationship to Trainer model
    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    // Relationship to Bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

