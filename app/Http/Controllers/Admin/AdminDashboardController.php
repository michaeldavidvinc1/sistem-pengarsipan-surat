<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Disposisi;
use App\Models\Petugas;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        $surat_masuk = SuratMasuk::count();
        $surat_keluar = SuratKeluar::count();
        $disposisi = Disposisi::count(); 
        $petugas = Petugas::count(); 
        return view('admin.dashboard', compact('surat_masuk', 'surat_keluar', 'disposisi', 'petugas'));
    }
}
