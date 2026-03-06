<?php

namespace Database\Seeders;

use App\Models\BukuBesar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuBesarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bukuBesarsData = [
            // Aset Lancar
            ['no_bukubesar' => '101', 'tipe' => 'Aset Lancar', 'ket' => 'Kas'],
            ['no_bukubesar' => '102', 'tipe' => 'Aset Lancar', 'ket' => 'Bank'],
            ['no_bukubesar' => '103', 'tipe' => 'Aset Lancar', 'ket' => 'Persediaan Barang'],
            ['no_bukubesar' => '104', 'tipe' => 'Aset Lancar', 'ket' => 'Piutang Dagang'],
            ['no_bukubesar' => '105', 'tipe' => 'Aset Lancar', 'ket' => 'Piutang Lain-Lain'],
            ['no_bukubesar' => '106', 'tipe' => 'Aset Lancar', 'ket' => 'Biaya Dibayar Dimuka'],

            // Aset Tetap
            ['no_bukubesar' => '107', 'tipe' => 'Aset Tetap', 'ket' => 'Aset Tetap'],
            ['no_bukubesar' => '108', 'tipe' => 'Aset Tetap', 'ket' => 'Akumulasi Penyusutan'],

            // Kewajiban Lancar
            ['no_bukubesar' => '109', 'tipe' => 'Kewajiban Lancar', 'ket' => 'Utang Dagang'],
            ['no_bukubesar' => '110', 'tipe' => 'Kewajiban Lancar', 'ket' => 'Utang Lain-Lain'],
            ['no_bukubesar' => '111', 'tipe' => 'Ekuitas', 'ket' => 'Ekuitas'],

            // Kewajiban Lancar
            ['no_bukubesar' => '112', 'tipe' => 'Laba Kotor', 'ket' => 'Penjualan'],

            ['no_bukubesar' => '113', 'tipe' => 'Laba Kotor', 'ket' => 'Harga Pokok Penjualan'],

            ['no_bukubesar' => '114', 'tipe' => 'Biaya Lain', 'ket' => 'Biaya Operasional'],

            // ['no_bukubesar' => '113', 'tipe' => 'HPP ', 'ket' => 'Ekuitas'],

        ];

        BukuBesar::insert($bukuBesarsData);
    }
}
