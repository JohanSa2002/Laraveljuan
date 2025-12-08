<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Crear usuario administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@universidad.edu',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'student_id' => null,
            'career' => null,
        ]);

        // Crear estudiante de prueba
        User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@estudiante.edu',
            'password' => Hash::make('password123'),
            'role' => 'student',
            'student_id' => '2021-0001',
            'career' => 'Ingeniería en Sistemas',
        ]);
    }
}