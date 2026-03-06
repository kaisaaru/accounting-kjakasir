<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Repository\PurchaseOrder\PurchaseOrderRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $purchaseOrderRepository;
    public function __construct(
        PurchaseOrderRepository $purchaseOrderRepository
    ) {
        $this->purchaseOrderRepository = $purchaseOrderRepository;
    }

    public function run(): void
    {
        $barang = Barang::all()->random();
        $validatedData = [
            'selectedItems' => '[{"id":"1","barang_id":"' . $barang->barang_id . '","nama_barang":"' . $barang->nama_barang . '","satuan":"' . $barang->satuan . '","quantity":1000,"price":100,"discountpersen":10,"discount":0,"total":90000}]',
            'tanggal_po' => '2024-03-21',
            'kode_perusahaan' => 'S-0001',
            'termin' => null,
            'tanggal_termin' => '2024-06-19',
            'jatuh_tempo' => '90',
            'id' => 'ccebd80e-a885-4103-a22e-f710ecf0e874',
            'name' => 'Muhammad Faiq'
        ];

        $this->purchaseOrderRepository->CreatepurchaseOrderSeeder($validatedData);
    }
}
