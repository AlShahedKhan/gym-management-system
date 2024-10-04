<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['trainee_id', 'class_id', 'booking_time'];

    // A booking belongs to a trainee (user with "trainee" role)
    public function trainee()
    {
        return $this->belongsTo(User::class, 'trainee_id');
    }

    // A booking belongs to a class
    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }
}
