<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 1; $i <= 10; $i++) {
            $data[] = ['detail_id' => ($i - 1) * 3 + 1, 'penjualan_id' => $i, 'barang_id' => 1, 'harga' => 500000, 'jumlah' => 1];
            $data[] = ['detail_id' => ($i - 1) * 3 + 2, 'penjualan_id' => $i, 'barang_id' => 2, 'harga' => 300000, 'jumlah' => 2];
            $data[] = ['detail_id' => ($i - 1) * 3 + 3, 'penjualan_id' => $i, 'barang_id' => 3, 'harga' => 75000, 'jumlah' => 3];
        }

        DB::table('t_penjualan_detail')->insert($data);
    }
}
