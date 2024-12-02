<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Verifica y crea usuarios adicionales si hay menos de 10 usuarios en la base de datos
        if (User::count() < 10) {
            User::factory(5)->create(); // Crea 5 usuarios adicionales si hay menos de 10 en total
        }

        // Crea un usuario específico para pruebas
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // Contraseña para este usuario de prueba
        ]);

        // Verifica y crea órdenes adicionales si hay menos de 50 en la base de datos
        if (Order::count() < 50) {
            Order::factory(20)->create(); // Crea 20 órdenes adicionales si hay menos de 50 en total
        }

    }
}
