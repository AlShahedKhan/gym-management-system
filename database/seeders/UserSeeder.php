<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'              => 'Jarret Waelchi',
            'phone'              => '01811000000',
            'email'             => 'admin@stm.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('123456'),
            'remember_token'    => Str::random(10),
            'role_id'           => 1,
            'date_of_birth'     => '2022-09-07',
            'image_id'          => 1,
            'designation_id'    => rand(1, 5),
            'permissions' => [
                'user_read',
                'user_create',
                'user_update',
                'user_delete',
                'role_read',
                'role_create',
                'role_update',
                'role_delete',
                'trainer_read',
                'trainer_create',
                'trainer_update',
                'trainer_delete',
                'class_read',
                'class_create',
                'class_update',
                'class_delete',
                'booking_read',
                'booking_create',
                'booking_update',
                'booking_delete',
            ],
        ]);

        User::create([
            'name'              => 'Faye Clether',
            'phone'              => '01811000001',
            'email'             => 'trainer@stm.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('123456'),
            'remember_token'    => Str::random(10),
            'role_id'           => 2,
            'date_of_birth'     => '2022-09-07',
            'image_id'          => 2,
            'designation_id'    => rand(1, 5),
            'permissions' => [
                'user_read',
                'role_read',
                'trainer_read',
                'class_read',
                'booking_read',
            ],
        ]);

        User::create([
            'name'              => 'Anna Littlical',
            'phone'              => '01811000002',
            'email'             => 'trainee@stm.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('123456'),
            'remember_token'    => Str::random(10),
            'role_id'           => 3,
            'date_of_birth'     => '2022-09-07',
            'image_id'          => 3,
            'designation_id'    => rand(1, 5),
            'permissions' => [
                'booking_read',
                'booking_create',
                'booking_update',
                'booking_delete',
            ],
        ]);

        
    }
}
