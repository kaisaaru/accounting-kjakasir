<?php

namespace Database\Seeders;

use App\Repository\PenerimaanBarang\PenerimaanBarangRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenerimaanBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $penerimaaanbarangRepository;
    public function __construct(PenerimaanBarangRepository $penerimaaanbarangRepository)
    {
        $this->penerimaaanbarangRepository = $penerimaaanbarangRepository;
    }
    public function run(): void
    {
        $validatedData = [
            "ID_PO" => "PO-0001",
            "tanggal_pb" => "2024-03-21",
            "surat_jalan" => "SJ-0001",
            "ket" => "karena ada sedikit kesalahan",
            "result" => '[{"id":"1","quantity":"1000","harga":"100","diskon":"10","potongan":"0"}]',
            'id' => 'ccebd80e-a885-4103-a22e-f710ecf0e874',
            'name' => 'Muhammad Faiq'
        ];

        $this->penerimaaanbarangRepository->createPenerimaanBarangSeeder($validatedData);
    }
}
