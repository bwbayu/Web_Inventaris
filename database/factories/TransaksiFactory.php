<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_tinta' => fake()->numberBetween(1, 9),
            'id_stok_kertas' => fake()->numberBetween(1, 9),
            'id_stok_kain' => fake()->numberBetween(1, 9),
            'tgl' => fake()->dateTime(),
            'keterangan' => fake()->paragraph(),
            'roll_transaksi' => fake()->numberBetween(1, 10),
            'yard_transaksi' => fake()->numberBetween(50, 500)
        ];
    }
}
