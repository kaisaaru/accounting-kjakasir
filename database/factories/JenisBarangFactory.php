<?php

namespace Database\Factories;

use App\Models\JenisBarang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JenisBarang>
 */
class JenisBarangFactory extends Factory
{
    protected $model = JenisBarang::class;
    public function definition(): array
    {
        return [
            'id_jenis' => $this->faker->unique()->word(),
            'jenis_barang' => $this->faker->word(),
        ];
    }
}