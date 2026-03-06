<?php

namespace Database\Factories;

use App\Models\BukuBesar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubBukuBesar>
 */
class SubBukuBesarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $bukubesar = BukuBesar::all()->random();
        // $bukubesarID = BukuBesar::where('no_bukubesar', $bukubesar->no_bukubesar)->first();
        return [
            // 'no_bukubesar' => $bukubesar->no_bukubesar,
            // 'no_subbukubesar' => $this->faker->unique()->numberBetween(1, 1000),
            // 'ket' => $this->faker->word(),
            // 'bagian_dari_bukubesar' => $bukubesarID->tipe
        ];
    }
}
