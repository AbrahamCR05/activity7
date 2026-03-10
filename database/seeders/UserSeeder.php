<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Ensure roles exist
        $admin   = Role::firstOrCreate(['name' => 'administrative']);
        $teacher = Role::firstOrCreate(['name' => 'teacher']);
        $student = Role::firstOrCreate(['name' => 'student']);

        User::create([
            'username' => 'Admon',
            'email'    => 'admon@robotics.com',
            'password' => Hash::make('Adm@2022'),
            'role_id'  => $admin->id,
        ]);

        User::create([
            'username' => 'Tecmilenio',
            'email'    => 'tecmilenio@robotics.com',
            'password' => Hash::make('Adm@2022'),
            'role_id'  => $teacher->id,
        ]);

        User::create([
            'username' => 'Student',
            'email'    => 'student@robotics.com',
            'password' => Hash::make('Adm@2022'),
            'role_id'  => $student->id,
        ]);
    }
}
