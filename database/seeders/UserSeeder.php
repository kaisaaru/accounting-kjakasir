<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersData = [
            [
                'id' => 'ccebd80e-a885-4103-a22e-f710ecf0e874',
                'username' => 'Fanzz',
                'name' => 'Muhammad Faiq',
                'email' => 'mfaiq1205@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('pulina chan'), // Ubah nilai password menjadi "pulina chan"
                'kategori' => 'Developer',
                'kode_perusahaan' => 'D-0001'
            ],
            [
                'id' => '3ff46ff9-e19f-4bfb-9620-9a2c0ca24126',
                'username' => 'Kainzz',
                'name' => 'Kaisar Rayfa',
                'email' => 'kaisarrayfa99@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('pulina chan'), // Ubah nilai password menjadi "pulina chan"
                'kategori' => 'Developer',
                'kode_perusahaan' => 'D-0002'
            ],
        ];

       User::insert($usersData);
    }
}
