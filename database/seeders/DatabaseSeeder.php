<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Counter;
use App\Models\Medicine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $loket1 = Counter::updateOrCreate(
            ['slug' => 'loket-umum-1'],
            ['name' => 'Loket Umum 1']
        );

        // 2. Gunakan updateOrCreate untuk Admin
        User::updateOrCreate(
            ['email' => 'admin@farmasi.com'],
            [
                'name' => 'Administrator Utama',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'counter_id' => null,
            ]
        );

        User::updateOrCreate(
            ['email' => 'budi@farmasi.com'],
            [
                'name' => 'Budi Petugas',
                'password' => Hash::make('password'),
                'role' => 'staff',
                'counter_id' => $loket1->id,
            ]
        );

        $medicines = [
            [
                'name'     => 'Paracetamol 500mg',
                'code'     => 'PCT001',
                'stok'     => 100,
                'golongan' => 'obat bebas',
                'indikasi' => 'Meredakan demam dan nyeri ringan hingga sedang.',
                'harga'    => 5000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Amoxicillin 500mg',
                'code' => 'AMX001',
                'stok' => 50,
                'golongan' => 'obat keras',
                'indikasi' => 'Antibiotik untuk infeksi bakteri saluran pernapasan dan kulit.',
                'harga' => 12000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vitamin C 1000mg',
                'code' => 'VITC01',
                'stok' => 200,
                'golongan' => 'obat bebas',
                'indikasi' => 'Membantu menjaga daya tahan tubuh dan memulihkan kondisi setelah sakit.',
                'harga' => 15000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'  => 'Obat Batuk Sirup',
                'code'  => 'OBS001',
                'stok'  => 30,
                'golongan' => 'obat bebas terbatas',
                'indikasi' => 'Meredakan batuk berdahak dan melegakan tenggorokan.',
                'harga' => 25000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Asam Mefenamat 500mg',
                'code' => 'ASM001',
                'stok' => 75,
                'golongan' => 'obat keras',
                'indikasi' => 'Meredakan nyeri hebat seperti sakit gigi dan nyeri haid.',
                'harga' => 8000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($medicines as $med) {
            Medicine::updateOrCreate(
                ['code' => $med['code']],
                $med
            );
        }
    }
}
