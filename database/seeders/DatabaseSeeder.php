<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Barang;
use App\Models\BukuBesar;
use App\Models\JenisBarang;
use App\Models\Kategori;
use App\Models\Kelompok;
use App\Models\LabaRugi;
use App\Models\Neraca;
use App\Models\Perusahaan;
use App\Models\PurchaseOrder;
use App\Models\SubBukuBesar;
use App\Models\TipeAkun;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // UserSeeder::class,
            NeracaSeeder::class,
            TipeAkunSeeder::class,
            BukuBesarSeeder::class,
            SubBukuBesarSeeder::class,
            KategoriSeeder::class,
            KelompokSeeder::class,
            PerusahaanSeeder::class,
            CashOpnameSeeder::class
        ]);

        // JenisBarang::factory()->count(20)->create();
        // Perusahaan::factory()->count(20)->create();
        // Kategori::factory()->count(20)->create();
        // Kelompok::factory()->count(20)->create();
        // Barang::factory()->count(20)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com'
        // ]);

        // $this->call([
        //     PurchaseOrderSeeder::class,
        //     PenerimaanBarangSeeder::class,
        // ]);
    }
}
