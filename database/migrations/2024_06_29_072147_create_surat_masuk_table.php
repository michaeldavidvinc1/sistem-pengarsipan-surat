<?php

use App\Models\JenisSurat;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('no_sm');
            $table->date('tgl_surat');
            $table->string('perihal');
            $table->foreignIdFor(JenisSurat::class, 'jenis_surat_id');
            $table->string('asal_surat');
            $table->string('keterangan');
            $table->string('lokasi_sm');
            $table->string('berkas_sm');
            $table->string('status_disposisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuk');
    }
};
