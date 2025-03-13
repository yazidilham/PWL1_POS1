<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel m_level
        $data = DB::table('m_level')->get();

        // Tampilkan view level.blade.php dan kirim data
        return view('level', ['data' => $data]);
    }
}
