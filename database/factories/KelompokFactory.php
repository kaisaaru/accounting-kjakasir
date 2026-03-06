<?php

namespace Database\Factories;

use App\Models\Kategori;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelompok>
 */
class KelompokFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $Kategori = Kategori::all()->random();
        return [
            'kode_kategori' => $Kategori->kode_kategori,
            'kelompok_barang' => $this->faker->word(),
        ];
    }
}
