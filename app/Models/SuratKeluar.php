<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';

    protected $fillable = [
        'tgl_dikeluarkan',
        'no_sk',
        'perihal',
        'penerima',
        'lokasi_sk',
        'berkas_sk',
        'yang_menandatangani',
        'keterangan',
    ];
}
