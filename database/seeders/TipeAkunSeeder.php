<?php

namespace Database\Seeders;

use App\Models\TipeAkun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipeAkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipeAkunsData = [
            ['tipe' => 'Aset Lancar', 'jenis' => 'Aset', 'jumlah' => 0],
            ['tipe' => 'Aset Tetap', 'jenis' => 'Aset', 'jumlah' => 0],
            ['tipe' => 'Kewajiban Lancar', 'jenis' => 'Kewajiban Dan Ekuitas', 'jumlah' => 0],
            ['tipe' => 'Ekuitas', 'jenis' => 'Kewajiban Dan Ekuitas', 'jumlah' => 0],
            ['tipe' => 'Laba Kotor', 'jenis' => 'Laba Rugi', 'jumlah' => 0],
            ['tipe' => 'Laba Bersih', 'jenis' => 'Laba Rugi', 'jumlah' => 0],
            ['tipe' => 'Biaya Lain', 'jenis' => 'Laba Rugi', 'jumlah' => 0],
            // ['tipe' => 'Harga Pokok Penjualan', 'jenis' => 'Laba Rugi', 'jumlah' => 0],
        ];

        TipeAkun::insert($tipeAkunsData);
    }
}
