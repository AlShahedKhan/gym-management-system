<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            // For users
            'users' => [
                'read' => 'user_read', 
                'create' => 'user_create', 
                'update' => 'user_update', 
                'delete' => 'user_delete'
            ],
            // For roles
            'roles' => [
                'read' => 'role_read', 
                'create' => 'role_create', 
                'update' => 'role_update', 
                'delete' => 'role_delete'
            ],
            // For trainers
            'trainers' => [
                'read' => 'trainer_read', 
                'create' => 'trainer_create', 
                'update' => 'trainer_update', 
                'delete' => 'trainer_delete'
            ],
            // For classes
            'classes' => [
                'read' => 'class_read', 
                'create' => 'class_create', 
                'update' => 'class_update', 
                'delete' => 'class_delete'
            ],
            // For bookings
            'bookings' => [
                'read' => 'booking_read', 
                'create' => 'booking_create', 
                'update' => 'booking_update', 
                'delete' => 'booking_delete'
            ],
        ];

        foreach ($attributes as $key => $attribute) {
            $permission = new Permission();
            $permission->attribute = $key;
            $permission->keywords = $attribute;
            $permission->save();
        }
    }
}
