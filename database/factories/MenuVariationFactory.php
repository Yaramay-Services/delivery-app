<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuVariation>
 */
class MenuVariationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price' => $this->faker->numberBetween(20, 100),
            'selling_price' => $this->faker->numberBetween(20, 100),
            'menu_variation_name' => 'menu variation ' . $this->faker->word(),
        ];
    }
}
