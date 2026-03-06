<?php

namespace Database\Seeders;

use App\Models\Kelompok;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelompokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelompok = [
            ['kode_kelompok' => 'KL0001', 'kode_kategori' => 'K0001', 'kelompok_barang' => 'Laptop'],
            ['kode_kelompok' => 'KL0002', 'kode_kategori' => 'K0001', 'kelompok_barang' => 'Printer'],
            // ['kode_kelompok' => 'KL0003', 'kode_kategori' => 'K0001', 'kelompok_barang' => 'Susu'],
            // ['kode_kelompok' => 'KL0004', 'kode_kategori' => 'K0002', 'kelompok_barang' => 'Mie Rebus'],
            // ['kode_kelompok' => 'KL0005', 'kode_kategori' => 'K0002', 'kelompok_barang' => 'Mie Goreng'],
        ];

        Kelompok::insert($kelompok);
    }
}
