<?php

namespace App\Http\Controllers;

use App\Models\fakultas;
use App\Models\Mahasiswa;
use App\Models\prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $data['mahasiswa'] = Mahasiswa::all();
        $data['prodi'] = prodi::all();
        $data['fakultas'] = fakultas::all();
        $data['mahasiswaprodi'] = DB::select('SELECT p.nama_prodi, COUNT(*) as jumlah
        FROM mahasiswa m
        JOIN prodi p ON m.prodi_id = p.id
        GROUP BY p.nama_prodi');
        // dd($data['mahasiswaprodi']);
        return view('dashboard', $data);
    }
}
