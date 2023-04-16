<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StokKain>
 */
class StokKainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_produksi' => fake()->numberBetween(1, 9),
            'id_kain' => fake()->numberBetween(1, 9),
            'total_roll' => fake()->numberBetween(1, 50),
            'total_yard' => fake()->numberBetween(100, 1000)

        ];
    }
}
