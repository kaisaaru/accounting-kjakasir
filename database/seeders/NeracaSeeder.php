<?php

namespace Database\Seeders;

use App\Models\Neraca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NeracaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $neracasData = [
            ['neraca' => 'Aset'],
            ['neraca' => 'Kewajiban Dan Ekuitas'],
        ];

        Neraca::insert($neracasData);
    }
}
