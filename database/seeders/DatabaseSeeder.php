<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Driver;
use App\Models\Kendaraan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'approver',
            'email' => 'approver@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'approver',
        ]);

        Kendaraan::create([
            'merk' => 'Toyota',
            'jenis' => 'penumpang',
            'konsumsi_bbm' => '15 km/l',
            'riwayat_service' => '2023-12-01',
            'last_used' => '2024-02-10',
            'is_owned' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Kendaraan::create([
            'merk' => 'Toyota',
            'jenis' => 'Penumpang',
            'konsumsi_bbm' => '15 km/l',
            'riwayat_service' => '2023-12-01',
            'last_used' => '2024-02-10',
            'is_owned' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Kendaraan::create([
            'merk' => 'Honda',
            'jenis' => 'Barang',
            'konsumsi_bbm' => '30 km/l',
            'riwayat_service' => '2023-12-01',
            'last_used' => '2024-02-10',
            'is_owned' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Driver::create([
            'name' => 'Agil',
            'usia' => '20',
            'alamat' => 'jalan Kelingking',
        ]);

        Driver::create([
            'name' => 'Nawi',
            'usia' => '20',
            'alamat' => 'jalan Kelingking',
        ]);

        Driver::create([
            'name' => 'Fikri',
            'usia' => '20',
            'alamat' => 'jalan Kelingking',
        ]);
    }
}
