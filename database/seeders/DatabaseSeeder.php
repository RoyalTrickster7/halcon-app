<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear roles si no existen
        $roles = ['Admin', 'Ventas', 'Almacen', 'Compras', 'Ruta'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Crear usuarios adicionales si hay menos de 10 usuarios en la base de datos
        if (User::count() < 10) {
            User::factory(5)->create()->each(function ($user) {
                // Asignar un rol aleatorio a cada usuario
                $user->assignRole(Role::inRandomOrder()->first()->name);
            });
        }

        // Crear un usuario específico para pruebas si no existe
        if (!User::where('email', 'test@example.com')->exists()) {
            $testUser = User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'), // Contraseña para este usuario de prueba
            ]);
            $testUser->assignRole('Admin'); // Asignar el rol de Admin al usuario de prueba
        }

        // Crear órdenes adicionales si hay menos de 50 en la base de datos
        if (Order::count() < 50) {
            Order::factory(20)->create();
        }
    }
}
