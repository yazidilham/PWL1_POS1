<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['penjualan_id' => 1, 'user_id' => 1, 'tanggal' => '2024-03-01', 'total' => 150000],
            ['penjualan_id' => 2, 'user_id' => 2, 'tanggal' => '2024-03-02', 'total' => 250000],
            ['penjualan_id' => 3, 'user_id' => 3, 'tanggal' => '2024-03-03', 'total' => 350000],
            ['penjualan_id' => 4, 'user_id' => 1, 'tanggal' => '2024-03-04', 'total' => 450000],
            ['penjualan_id' => 5, 'user_id' => 2, 'tanggal' => '2024-03-05', 'total' => 550000],
            ['penjualan_id' => 6, 'user_id' => 3, 'tanggal' => '2024-03-06', 'total' => 650000],
            ['penjualan_id' => 7, 'user_id' => 1, 'tanggal' => '2024-03-07', 'total' => 750000],
            ['penjualan_id' => 8, 'user_id' => 2, 'tanggal' => '2024-03-08', 'total' => 850000],
            ['penjualan_id' => 9, 'user_id' => 3, 'tanggal' => '2024-03-09', 'total' => 950000],
            ['penjualan_id' => 10, 'user_id' => 1, 'tanggal' => '2024-03-10', 'total' => 1050000],
        ];
        
        DB::table('t_penjualan')->insert($data);
    }
}
