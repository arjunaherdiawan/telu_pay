<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Data Dummy Mahasiswa
        $mhs1 = \App\Models\mahasiswa::create([
            'student_id'   => '12345678',
            'nim'          => '12345678',
            'nama_lengkap' => 'Arjuna Juna',
            'email'        => 'juna@student.telkomuniversity.ac.id',
            'nomer_hp'     => '081234567890',
            'fakultas'     => 'FIF',
            'prodi'        => 'Informatika',
        ]);

        $akunMhs = \App\Models\akun::create([
            'student_id' => $mhs1->student_id,
            'username'   => 'juna',
            'password'   => \Illuminate\Support\Facades\Hash::make('password123'),
            'created_at' => now(),
        ]);

        \App\Models\wallet::create([
            'account_id' => $akunMhs->account_id,
            'saldo'      => 100000,
            'mata_uang'  => 'IDR',
            'created_at' => now(),
            'update_at'  => now(),
        ]);

        // 2. Data Dummy Merchant
        // Karena skema database memaksa 'akun' punya 'student_id', kita buat mahasiswa dummy untuk merchant
        $mhsMerchant = \App\Models\mahasiswa::create([
            'student_id'   => 'M001',
            'nim'          => 'M001',
            'nama_lengkap' => 'Arjuna Merchant',
            'email'        => 'arjuna123@gmail.com',
            'nomer_hp'     => '081222333444',
            'fakultas'     => 'Merchant',
            'prodi'        => 'Merchant',
        ]);

        $akunMerchant = \App\Models\akun::create([
            'student_id' => $mhsMerchant->student_id,
            'username'   => 'arjuna123@gmail.com',
            'password'   => \Illuminate\Support\Facades\Hash::make('juna123'),
            'created_at' => now(),
        ]);

        $merchant = \App\Models\Merchant::create([
            'account_id'    => $akunMerchant->account_id,
            'nama_merchant' => 'Toko Arjuna',
            'nama_kontak'   => 'Arjuna',
            'nomor_kontak'  => '081222333444',
            'lokasi'        => 'Kantin GKU',
            'konter_hp'     => '081222333444',
            'created_at'    => now(),
        ]);

        // Wallet untuk merchant
        \App\Models\MerchantWallet::create([
            'merchant_id' => $merchant->merchant_id,
            'saldo'       => 500000,
            'mata_uang'   => 'IDR',
            'created_at'  => now(),
            'update_at'   => now(),
        ]);
    }
}
