<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugas';

    protected $fillable = [
        'nama_lengkap',
        'email',
        'alamat',
        'tgl_lahir',
        'jenis_kelamin',
        'telp',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function suratKeluar(){
        return $this->hasMany(SuratKeluar::class);
    }



}
