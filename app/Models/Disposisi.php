<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;

    protected $table = 'disposisi';

    protected $fillable = [
        'no_sm',
        'tgl_disposisi',
        'keterangan',
        'tgl_surat',
        'asal_surat',
        'penerima_disposisi',
    ];
}
