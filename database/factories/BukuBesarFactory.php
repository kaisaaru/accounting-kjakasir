<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BukuBesar>
 */
class BukuBesarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        /*$tipe = [
                // 'Kas',
                // 'Piutang Dagang',
                // 'Persediaan',
                // 'Aktiva Lancar Lainnya',
                // 'Aktiva Tetap',
                // 'Akumulasi Penyusutan',
                // 'Aktiva Lain-Lain',
                // 'Hutang Dagang',
                // 'Hutang Lancar Lainnya',
                // 'Hutang Jangka Panjang',
                // 'Ekuitas',
                // 'Pendapatan Usaha',
                // 'Biaya Operasional',
                // 'Harga Pokok Penjualan',
                // 'Pendapatan Usaha Lain',
                // 'Beban Usaha Lain',
            ];*/

        return [];
    }

    /*public static function getUniqueTipes()
    {
        return self::distinct()->pluck('tipe');
    }*/
}
