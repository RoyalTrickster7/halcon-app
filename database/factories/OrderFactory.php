<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_name' => $this->faker->name(),
            'product_details' => $this->faker->sentence(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->randomElement(['Pedido', 'En Proceso', 'En Ruta', 'Entregado']),
        ];
    }
}
