<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanSuratMasukController extends Controller
{
    public function index(){
        return view('admin.laporan_surat_masuk.index');
    }
}
