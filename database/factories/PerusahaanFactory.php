<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Perusahaan;

class PerusahaanFactory extends Factory
{
    protected $model = Perusahaan::class;

    public function definition()
    {
        $jenisOptions = ['Supplier', 'Konsumen'];

        return [
            'kode_perusahaan' => $this->faker->unique()->randomNumber(2),
            'nama_perusahaan' => $this->faker->company(),
            'jenis' => $this->faker->randomElement($jenisOptions),
            'alamat_kantor' => $this->faker->address(),
            'alamat_gudang' => $this->faker->address(),
            'nama_pimpinan' => $this->faker->name(),
            'no_telepon' => $this->faker->phoneNumber(),
        ];
    }
}
