<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Super Admin',
                'cedula' => '0000',
                'institutional_email' => 'admin@utp.edu.co',
                'is_advisor' => false,
                'is_admin' => true,
                'password' => Hash::make('admin123'),
            ]
        );
    }
}
