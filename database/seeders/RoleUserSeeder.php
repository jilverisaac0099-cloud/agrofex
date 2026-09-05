<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Usuario Administrador
        User::updateOrCreate(
            ['email' => 'admin@test.com'], // Criterio de búsqueda (para no duplicar)
            [
                'name' => 'Administrador',
                'password' => Hash::make('password'), // Contraseña: password
                'role' => 'administrador'
            ]
        );

        // 2. Usuario Productor
        User::updateOrCreate(
            ['email' => 'productor@test.com'],
            [
                'name' => 'Juan Productor',
                'password' => Hash::make('password'),
                'role' => 'productor'
            ]
        );

        // 3. Usuario Auditor
        User::updateOrCreate(
            ['email' => 'auditor@test.com'],
            [
                'name' => 'María Auditora',
                'password' => Hash::make('password'),
                'role' => 'auditor'
            ]
        );

        // 4. Usuario Cliente
        User::updateOrCreate(
            ['email' => 'cliente@test.com'],
            [
                'name' => 'Pedro Cliente',
                'password' => Hash::make('password'),
                'role' => 'cliente'
            ]
        );
    }
}