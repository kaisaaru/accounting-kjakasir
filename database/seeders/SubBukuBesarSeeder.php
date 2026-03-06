<?php

namespace Database\Seeders;

use App\Models\SubBukuBesar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubBukuBesarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subbukuBesarsData = [
            // Kas
            ['no_bukubesar' => '101', 'no_subbukubesar' => '101-1', 'ket' => 'Kas Operasional', 'bagian_dari_bukubesar' => '-'],
            ['no_bukubesar' => '101', 'no_subbukubesar' => '101-2', 'ket' => 'Kas Kecil Tunai', 'bagian_dari_bukubesar' => '-'],

            // Bank
            ['no_bukubesar' => '102', 'no_subbukubesar' => '102-1', 'ket' => 'Bank BCA', 'bagian_dari_bukubesar' => '-'],
            ['no_bukubesar' => '102', 'no_subbukubesar' => '102-2', 'ket' => 'Bank BNI', 'bagian_dari_bukubesar' => '-'],

            // Persediaan Barang Dagang
            ['no_bukubesar' => '103', 'no_subbukubesar' => '103-1', 'ket' => 'Persediaan Barang Dagang', 'bagian_dari_bukubesar' => '-'],

            // Piutang Dagang
            ['no_bukubesar' => '104', 'no_subbukubesar' => '104-1', 'ket' => 'Piutang Pelanggan', 'bagian_dari_bukubesar' => '-'],
            ['no_bukubesar' => '104', 'no_subbukubesar' => '104-2', 'ket' => 'Piutang Warkat Pelanggan', 'bagian_dari_bukubesar' => '-'],

            // Piutang Lain-Lain
            ['no_bukubesar' => '105', 'no_subbukubesar' => '105-1', 'ket' => 'Piutang Lainnya', 'bagian_dari_bukubesar' => '-'],

            // Biaya Dibayar Dimuka
            ['no_bukubesar' => '106', 'no_subbukubesar' => '106-1', 'ket' => 'Asuransi Dibayar Dimuka', 'bagian_dari_bukubesar' => '-'],

            // Aset Tetap
            ['no_bukubesar' => '107', 'no_subbukubesar' => '107-1', 'ket' => 'Kendaraan', 'bagian_dari_bukubesar' => '-'],
            ['no_bukubesar' => '107', 'no_subbukubesar' => '107-2', 'ket' => 'Inventaris Kantor', 'bagian_dari_bukubesar' => '-'],

            // Akumulasi Penyusutan
            ['no_bukubesar' => '108', 'no_subbukubesar' => '108-1', 'ket' => 'Akumulasi Penyusutan Kendaraan', 'bagian_dari_bukubesar' => '-'],
            ['no_bukubesar' => '108', 'no_subbukubesar' => '108-2', 'ket' => 'Akumulasi Penyusutan Inventaris Kantor', 'bagian_dari_bukubesar' => '-'],

            // Hutang Dagang
            ['no_bukubesar' => '109', 'no_subbukubesar' => '109-1', 'ket' => 'Utang Supplier', 'bagian_dari_bukubesar' => '-'],

            // Hutang Lain-Lain
            ['no_bukubesar' => '110', 'no_subbukubesar' => '110-1', 'ket' => 'Titipan Konsumen', 'bagian_dari_bukubesar' => '-'],

            ['no_bukubesar' => '111', 'no_subbukubesar' => '111-1', 'ket' => 'Modal Usaha', 'bagian_dari_bukubesar' => '-'],
            ['no_bukubesar' => '111', 'no_subbukubesar' => '111-2', 'ket' => 'Laba Ditahan', 'bagian_dari_bukubesar' => '-'],
            ['no_bukubesar' => '111', 'no_subbukubesar' => '111-3', 'ket' => 'Laba Periode Berjalan', 'bagian_dari_bukubesar' => '-'],
            // ['no_bukubesar' => '111', 'no_subbukubesar' => '111-3', 'ket' => 'Laba Bulan Ini', 'bagian_dari_bukubesar' => '-'],

            // Hutang Lain-Lain
            ['no_bukubesar' => '112', 'no_subbukubesar' => '112-1', 'ket' => 'Penjualan', 'bagian_dari_bukubesar' => '-'],

            // ['no_bukubesar' => '113', 'no_subbukubesar' => '113-1', 'ket' => 'PBD Awal', 'bagian_dari_bukubesar' => '-'],
            // ['no_bukubesar' => '113', 'no_subbukubesar' => '113-2', 'ket' => 'Pembelian', 'bagian_dari_bukubesar' => '-'],
            // ['no_bukubesar' => '113', 'no_subbukubesar' => '113-3', 'ket' => 'PBD Akhir', 'bagian_dari_bukubesar' => '-'],
            ['no_bukubesar' => '113', 'no_subbukubesar' => '113-1', 'ket' => 'Harga Pokok Penjualan', 'bagian_dari_bukubesar' => '-'],

            ['no_bukubesar' => '114', 'no_subbukubesar' => '114-1', 'ket' => 'Biaya BBM', 'bagian_dari_bukubesar' => '-'],
            ['no_bukubesar' => '114', 'no_subbukubesar' => '114-2', 'ket' => 'Biaya Listrik', 'bagian_dari_bukubesar' => '-'],
            ['no_bukubesar' => '114', 'no_subbukubesar' => '114-3', 'ket' => 'Biaya Pulsa Telepon', 'bagian_dari_bukubesar' => '-'],
            ['no_bukubesar' => '114', 'no_subbukubesar' => '114-4', 'ket' => 'Biaya Pengiriman', 'bagian_dari_bukubesar' => '-'],
            ['no_bukubesar' => '114', 'no_subbukubesar' => '114-5', 'ket' => 'Biaya Gaji Karyawan', 'bagian_dari_bukubesar' => '-'],


        ];

        SubBukuBesar::insert($subbukuBesarsData);
    }
}
