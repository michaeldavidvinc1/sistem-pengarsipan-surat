<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use HasFactory;

    protected $table = 'jenis_surat';

    protected $fillable = [
        'jenis_surat'
    ];

    public function suratMasuk(){
        return $this->hasMany(SuratMasuk::class);
    }
}
