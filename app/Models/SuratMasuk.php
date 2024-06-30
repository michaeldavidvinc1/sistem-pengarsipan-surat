<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'surat_masuk';

    protected $fillable = [
        'no_sm',
        'tgl_surat',
        'perihal',
        'jenis_surat_id',
        'asal_surat',
        'keterangan',
        'lokasi_sm',
        'berkas_sm',
        'status_disposisi',
    ];
}
