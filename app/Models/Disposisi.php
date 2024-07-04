<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;

    protected $table = 'disposisi';

    protected $fillable = [
        'surat_masuk_id',
        'tgl_disposisi',
        'keterangan',
        'asal_surat',
        'penerima_disposisi',
        'sifat',
    ];
}
