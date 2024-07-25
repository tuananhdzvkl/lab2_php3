<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Product;
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'order_id' => Order::factory(),
        'product_id' => Product::factory(),
        'quantity' => $this->faker->numberBetween(1, 5),
        'price' => $this->faker->randomFloat(2, 100, 1000),
    ];
}

}
