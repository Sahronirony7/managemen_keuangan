<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            // --- Pemasukan ---
            [
                'name' => 'Donasi Umum / Sedekah',
                'is_expense' => false,
                'image' => 'categories/income.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Donasi Acara / Event',
                'is_expense' => false,
                'image' => 'categories/income.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Penerimaan Zakat / Infaq',
                'is_expense' => false,
                'image' => 'categories/income.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Penerimaan untuk Operasional Kantor',
                'is_expense' => false,
                'image' => 'categories/income.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Penerimaan Wakaf / Hibah',
                'is_expense' => false,
                'image' => 'categories/income.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pendapatan Lainnya',
                'is_expense' => false,
                'image' => 'categories/income.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // --- Pengeluaran ---

            [
                'name' => 'Perijinan, administrasi dan Dokumen',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Beban Sewa Kantor',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Listrik, Air dan Telepon Pulsa',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'name' => 'Transportasi',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Penyaluran Amil Zakat / Infak',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Penyaluran Bantuan Sosial',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Operasional Rumah Tangga',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Operasional Yayasan',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Penyaluran Infak',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gaji & Honor',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Perlengkapan Kantor / ATK',
                'is_expense' => true,
                'image' => 'categories/transport.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Konsumsi / Logistik',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Penyaluran Santunan',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Penyaluran Program Pendidikan',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'name' => 'Penyaluran Program Zakat',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'name' => 'Penyaluran Program Pemberdayaan Ekonomi',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'name' => 'Penyaluran Program Wakaf Quran',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Peralatan / Inventaris',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pemeliharaan Fasilitas',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pengeluaran Lainnya',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'name' => 'Penyaluran Program Lainnya',
                'is_expense' => true,
                'image' => 'categories/expense.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
