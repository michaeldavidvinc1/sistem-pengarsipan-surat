<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\DisposisiController;
use App\Http\Controllers\Admin\JenisSuratController;
use App\Http\Controllers\Admin\LaporanSuratMasukController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\SuratKeluarController;
use App\Http\Controllers\Admin\SuratMasukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Petugas\PetugasDashboardController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware('role:admin')->group(function(){
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Route Jenis Surat
    Route::get('jenis_surat', [JenisSuratController::class, 'index'])->name('jenisSurat.index');
    Route::post('jenis_surat', [JenisSuratController::class, 'store'])->name('jenisSurat.store');
    Route::get('jenis_surat/{id}', [JenisSuratController::class, 'edit'])->name('jenisSurat.edit');
    Route::put('jenis_surat/{id}', [JenisSuratController::class, 'update'])->name('jenisSurat.update');
    Route::delete('jenis_surat/delete', [JenisSuratController::class, 'destroy'])->name('jenisSurat.delete');

    // Route Surat Masuk
    Route::get('surat_masuk', [SuratMasukController::class, 'index'])->name('suratMasuk.index');
    Route::get('surat_masuk/create', [SuratMasukController::class, 'create'])->name('suratMasuk.create');
    Route::post('surat_masuk/create', [SuratMasukController::class, 'store'])->name('suratMasuk.store');
    Route::get('surat_masuk/{id}', [SuratMasukController::class, 'edit'])->name('suratMasuk.edit');
    Route::put('surat_masuk/{id}', [SuratMasukController::class, 'update'])->name('suratMasuk.update');
    Route::delete('surat_masuk', [SuratMasukController::class, 'destroy'])->name('suratMasuk.destroy');

    // Route Surat Keluar
    Route::get('surat_keluar', [SuratKeluarController::class, 'index'])->name('suratKeluar.index');
    Route::get('surat_keluar/create', [SuratKeluarController::class, 'create'])->name('suratKeluar.create');
    Route::post('surat_keluar/create', [SuratKeluarController::class, 'store'])->name('suratKeluar.store');
    Route::get('surat_keluar/{id}', [SuratKeluarController::class, 'edit'])->name('suratKeluar.edit');
    Route::put('surat_keluar/{id}', [SuratKeluarController::class, 'update'])->name('suratKeluar.update');
    Route::delete('surat_keluar', [SuratKeluarController::class, 'destroy'])->name('suratKeluar.destroy');

    // Route Disposisi
    Route::get('disposisi', [DisposisiController::class, 'index'])->name('disposisi.index');
    Route::get('disposisi/create', [DisposisiController::class, 'create'])->name('disposisi.create');
    Route::post('disposisi/create', [DisposisiController::class, 'store'])->name('disposisi.store');
    Route::delete('disposisi', [DisposisiController::class, 'destroy'])->name('disposisi.destroy');

    // Route Petugas
    Route::get('user', [PetugasController::class, 'index'])->name('petugasUser.index');
    Route::get('user/create', [PetugasController::class, 'create'])->name('petugasUser.create');
    Route::post('user/create', [PetugasController::class, 'store'])->name('petugasUser.store');
    Route::get('user/{id}', [PetugasController::class, 'edit'])->name('petugasUser.edit');
    Route::put('user/{id}', [PetugasController::class, 'update'])->name('petugasUser.update');
    Route::delete('user', [PetugasController::class, 'destroy'])->name('petugasUser.destroy');

    // Route Laporan Surat Masuk
    Route::get('laporan-surat-masuk', [LaporanSuratMasukController::class, 'index'])->name('laporanSuratMasuk.index');


});

Route::prefix('petugas')->middleware('role:petugas')->group(function(){
    Route::get('/', [PetugasDashboardController::class, 'index'])->name('petugas.dashboard');
});

Route::prefix('user')->middleware('role:user')->group(function(){
    Route::get('/', [UserDashboardController::class, 'index'])->name('suer.dashboard');
});

Route::get('', [AuthController::class, 'login_page'])->name('login.page')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->name('login.store')->middleware('guest');