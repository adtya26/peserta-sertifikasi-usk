<?php

namespace Database\Seeders;

use App\Models\Skema;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
        ]);

        $skema = [
            ['JWD-001', 'Junior Web Developer', 'Skema okupasi pengembangan web tingkat junior'],
            ['NET-001', 'Network Administrator', 'Skema okupasi administrasi jaringan'],
            ['DAT-001', 'Data Analyst', 'Skema okupasi analisis data'],
        ];

        foreach ($skema as [$kode, $nama, $desk]) {
            Skema::create([
                'kode_skema' => $kode,
                'nama_skema' => $nama,
                'deskripsi' => $desk,
            ]);
        }
    }
}