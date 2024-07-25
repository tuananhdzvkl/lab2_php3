<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

    class ProductFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 100, 1000),
        ];
    }

    }

