<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Disposisi;
use App\Models\Petugas;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class PetugasDashboardController extends Controller
{
    public function index(){
        $surat_masuk = SuratMasuk::count();
        $surat_keluar = SuratKeluar::count();
        $disposisi = Disposisi::count(); 
        $petugas = Petugas::count(); 
        return view('petugas.dashboard', compact('surat_masuk', 'surat_keluar', 'disposisi', 'petugas'));
    }
}
