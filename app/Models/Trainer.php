<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'expertise', 'availability'];

    // A trainer belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A trainer has many classes
    public function classes()
    {
        return $this->hasMany(ClassModel::class, 'trainer_id');
    }
}
