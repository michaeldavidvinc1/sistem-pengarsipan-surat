<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PetugasLaporanSuratMasukController extends Controller
{
    public function index(){
        return view('petugas.laporan_surat_masuk.index');
    }
}
