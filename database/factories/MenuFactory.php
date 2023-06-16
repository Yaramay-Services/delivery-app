<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'menu_name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(100, 200),
            'selling_price' => $this->faker->numberBetween(100, 200),
            'display_order' => 0,
            'is_published' => 0,
            'hits' => 0,
        ];
    }
}
