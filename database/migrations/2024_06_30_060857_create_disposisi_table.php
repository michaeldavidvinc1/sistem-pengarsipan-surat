<?php

use App\Models\SuratMasuk;
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
        Schema::create('disposisi', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SuratMasuk::class, 'surat_masuk_id');
            $table->date('tgl_disposisi');
            $table->string('keterangan');
            $table->string('asal_surat');
            $table->string('sifat');
            $table->string('penerima_disposisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposisi');
    }
};
