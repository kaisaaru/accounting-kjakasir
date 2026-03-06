<?php

namespace Database\Seeders;

use App\Models\CashOpname;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CashOpnameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cashopname = [
            ['pecahan' => '100000'],
            ['pecahan' => '50000'],
            ['pecahan' => '20000'],
            ['pecahan' => '10000'],
            ['pecahan' => '5000'],
            ['pecahan' => '2000'],
            ['pecahan' => '1000'],
            ['pecahan' => '500'],
            ['pecahan' => '200'],
            ['pecahan' => '100'],
            // ['kode_kategori' => 'K0002', 'kategori_barang' => 'Makanan'],
        ];

        CashOpname::insert($cashopname);
    }
}
