<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'Royalyusuke@example.com',
                'password' => bcrypt('admin'),
                'role' => 'Admin',
            ],
            [
                'name' => 'Ventas User',
                'email' => 'ventas@example.com',
                'password' => bcrypt('ventas11'),
                'role' => 'Ventas',
            ],
            [
                'name' => 'Almacen User',
                'email' => 'almacen@example.com',
                'password' => bcrypt('almacen1'),
                'role' => 'Almacen',
            ],
            [
                'name' => 'Compras User',
                'email' => 'compras@example.com',
                'password' => bcrypt('compras1'),
                'role' => 'Compras',
            ],
            [
                'name' => 'Ruta User',
                'email' => 'ruta@example.com',
                'password' => bcrypt('rutaruta'),
                'role' => 'Ruta',
            ],
        ];

        foreach ($users as $userData) {
            // Crear usuario si no existe
            $user = User::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => $userData['password'],
                ]
            );

            // Asigna el rol al usuario
            $role = Role::where('name', $userData['role'])->first();
            if ($role) {
                $user->assignRole($role);
            }
        }
    }
}
