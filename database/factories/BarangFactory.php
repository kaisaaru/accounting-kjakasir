<?php

namespace Database\Factories;

use App\Models\Barang;
use App\Models\Perusahaan;
use App\Models\Kelompok;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    protected $model = Barang::class;
    public function definition(): array
    {       
        $user_id = [
            'ccebd80e-a885-4103-a22e-f710ecf0e874',
            '3ff46ff9-e19f-4bfb-9620-9a2c0ca24126'
        ];

        $Kelompok = Kelompok::all()->random();
        $kelompokID = Kelompok::where('id', $Kelompok->id)->first();
        $Perusahaan = Perusahaan::all()->random();
        return [
            'barang_id' => $this->faker->unique()->word(),
            'user_id' => $this->faker->randomElement($user_id),
            'nama_barang' => $this->faker->word(),
            'satuan' => $this->faker->word(),
            'stok' => $this->faker->randomNumber(),
            'kategori' => $Kelompok->kode_kategori,
            'kelompok' => $kelompokID->kelompok_barang,
            'harga_jual' => $this->faker->randomNumber(),
            'harga_beli' => $this->faker->randomNumber(),
            'Perusahaan' => $Perusahaan->kode_perusahaan,
        ];
    }
}
