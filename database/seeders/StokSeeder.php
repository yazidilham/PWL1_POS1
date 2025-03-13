<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['stok_id' => 1, 'barang_id' => 1, 'jumlah' => 50],
            ['stok_id' => 2, 'barang_id' => 2, 'jumlah' => 40],
            ['stok_id' => 3, 'barang_id' => 3, 'jumlah' => 100],
            ['stok_id' => 4, 'barang_id' => 4, 'jumlah' => 70],
            ['stok_id' => 5, 'barang_id' => 5, 'jumlah' => 200],
            ['stok_id' => 6, 'barang_id' => 6, 'jumlah' => 150],
            ['stok_id' => 7, 'barang_id' => 7, 'jumlah' => 90],
            ['stok_id' => 8, 'barang_id' => 8, 'jumlah' => 120],
            ['stok_id' => 9, 'barang_id' => 9, 'jumlah' => 30],
            ['stok_id' => 10, 'barang_id' => 10, 'jumlah' => 50],
        ];
        
        DB::table('t_stok')->insert($data);
    }
}
