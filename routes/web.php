<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\DisposisiController;
use App\Http\Controllers\Admin\JenisSuratController;
use App\Http\Controllers\Admin\LaporanSuratKeluarController;
use App\Http\Controllers\Admin\LaporanSuratMasukController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SuratKeluarController;
use App\Http\Controllers\Admin\SuratMasukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Petugas\PetugasDashboardController;
use App\Http\Controllers\Petugas\PetugasDisposisiController;
use App\Http\Controllers\Petugas\PetugasLaporanSuratKeluarController;
use App\Http\Controllers\Petugas\PetugasLaporanSuratMasukController;
use App\Http\Controllers\Petugas\PetugasSuratKeluarController;
use App\Http\Controllers\Petugas\PetugasSuratMasukController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserSuratKeluarController;
use App\Http\Controllers\User\UserSuratMasukController;
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
    Route::get('preview-pdf/{id}', [SuratMasukController::class, 'previewPdf'])->name('suratMasuk.preview');

    // Route Surat Keluar
    Route::get('surat_keluar', [SuratKeluarController::class, 'index'])->name('suratKeluar.index');
    Route::get('surat_keluar/create', [SuratKeluarController::class, 'create'])->name('suratKeluar.create');
    Route::post('surat_keluar/create', [SuratKeluarController::class, 'store'])->name('suratKeluar.store');
    Route::get('surat_keluar/{id}', [SuratKeluarController::class, 'edit'])->name('suratKeluar.edit');
    Route::put('surat_keluar/{id}', [SuratKeluarController::class, 'update'])->name('suratKeluar.update');
    Route::delete('surat_keluar', [SuratKeluarController::class, 'destroy'])->name('suratKeluar.destroy');
    Route::get('preview-pdf-keluar/{id}', [SuratKeluarController::class, 'previewPdf'])->name('suratKeluar.preview');

    // Route Disposisi
    Route::get('disposisi', [DisposisiController::class, 'index'])->name('disposisi.index');
    Route::get('disposisi/create', [DisposisiController::class, 'create'])->name('disposisi.create');
    Route::post('disposisi/create', [DisposisiController::class, 'store'])->name('disposisi.store');
    Route::delete('disposisi', [DisposisiController::class, 'destroy'])->name('disposisi.destroy');
    Route::get('disposisi-pdf/{id}', [DisposisiController::class, 'generate_pdf'])->name('disposisi.generatePdf');

    // Route Petugas
    Route::get('user', [PetugasController::class, 'index'])->name('petugasUser.index');
    Route::get('user/create', [PetugasController::class, 'create'])->name('petugasUser.create');
    Route::post('user/create', [PetugasController::class, 'store'])->name('petugasUser.store');
    Route::get('user/{id}', [PetugasController::class, 'edit'])->name('petugasUser.edit');
    Route::put('user/{id}', [PetugasController::class, 'update'])->name('petugasUser.update');
    Route::delete('user', [PetugasController::class, 'destroy'])->name('petugasUser.destroy');

    // Route Laporan Surat Masuk
    Route::get('laporan-surat-masuk', [LaporanSuratMasukController::class, 'index'])->name('laporanSuratMasuk.index');
    Route::get('laporan-preview-pdf/{id}', [LaporanSuratMasukController::class, 'previewPdf'])->name('laporansuratMasuk.preview');
    Route::get('laporan-surat-masuk/pdf', [LaporanSuratMasukController::class, 'generatePDF'])->name('laporanSuratMasuk.pdf');
    Route::get('laporan-surat-masuk/bulan-ini/pdf', [LaporanSuratMasukController::class, 'cetakBulanIni'])->name('bulanIni.pdf');
    Route::get('laporan-surat-masuk/minggu-ini/pdf', [LaporanSuratMasukController::class, 'cetakMingguIni'])->name('mingguIni.pdf');
    Route::get('laporan-surat-masuk/hari-ini/pdf', [LaporanSuratMasukController::class, 'cetakHariIni'])->name('hariIni.pdf');
    Route::get('laporan-surat-masuk/bulan-kemarin/pdf', [LaporanSuratMasukController::class, 'cetakBulanKemarin'])->name('bulanKemarin.pdf');
    Route::get('laporan-surat-masuk/kemarin/pdf', [LaporanSuratMasukController::class, 'cetakKemarin'])->name('kemarin.pdf');

    // Route Laporan Surat Masuk
    Route::get('laporan-surat-keluar', [LaporanSuratKeluarController::class, 'index'])->name('laporanSuratKeluar.index');
    Route::get('laporan-preview-pdf-keluar/{id}', [LaporanSuratKeluarController::class, 'previewPdf'])->name('laporansuratKeluar.preview');
    Route::get('laporan-surat-keluar/pdf', [LaporanSuratKeluarController::class, 'generatePDF'])->name('laporanSuratKeluar.pdf');
    Route::get('laporan-surat-keluar/bulan-ini/pdf', [LaporanSuratKeluarController::class, 'cetakBulanIni'])->name('bulanIniKeluar.pdf');
    Route::get('laporan-surat-keluar/minggu-ini/pdf', [LaporanSuratKeluarController::class, 'cetakMingguIni'])->name('mingguIniKeluar.pdf');
    Route::get('laporan-surat-keluar/hari-ini/pdf', [LaporanSuratKeluarController::class, 'cetakHariIni'])->name('hariIniKeluar.pdf');
    Route::get('laporan-surat-keluar/bulan-kemarin/pdf', [LaporanSuratKeluarController::class, 'cetakBulanKemarin'])->name('bulanKemarinKeluar.pdf');
    Route::get('laporan-surat-keluar/kemarin/pdf', [LaporanSuratKeluarController::class, 'cetakKemarin'])->name('kemarinKeluar.pdf');

    // Route Setting
    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::put('setting-update', [SettingController::class, 'update'])->name('setting.update');

});

Route::prefix('petugas')->middleware('role:petugas')->group(function(){
    Route::get('/', [PetugasDashboardController::class, 'index'])->name('petugas.dashboard');

    // Route Surat Masuk
    Route::get('surat_masuk', [PetugasSuratMasukController::class, 'index'])->name('petugas.suratMasuk.index');
    Route::get('surat_masuk/create', [PetugasSuratMasukController::class, 'create'])->name('petugas.suratMasuk.create');
    Route::post('surat_masuk/create', [PetugasSuratMasukController::class, 'store'])->name('petugas.suratMasuk.store');
    Route::get('surat_masuk/{id}', [PetugasSuratMasukController::class, 'edit'])->name('petugas.suratMasuk.edit');
    Route::put('surat_masuk/{id}', [PetugasSuratMasukController::class, 'update'])->name('petugas.suratMasuk.update');
    Route::delete('surat_masuk', [PetugasSuratMasukController::class, 'destroy'])->name('petugas.suratMasuk.destroy');
    Route::get('preview-pdf/{id}', [PetugasSuratMasukController::class, 'previewPdf'])->name('petugas.suratMasuk.preview');

    // Route Surat Keluar
    Route::get('surat_keluar', [PetugasSuratKeluarController::class, 'index'])->name('petugas.suratKeluar.index');
    Route::get('surat_keluar/create', [PetugasSuratKeluarController::class, 'create'])->name('petugas.suratKeluar.create');
    Route::post('surat_keluar/create', [PetugasSuratKeluarController::class, 'store'])->name('petugas.suratKeluar.store');
    Route::get('surat_keluar/{id}', [PetugasSuratKeluarController::class, 'edit'])->name('petugas.suratKeluar.edit');
    Route::put('surat_keluar/{id}', [PetugasSuratKeluarController::class, 'update'])->name('petugas.suratKeluar.update');
    Route::delete('surat_keluar', [PetugasSuratKeluarController::class, 'destroy'])->name('petugas.suratKeluar.destroy');
    Route::get('preview-pdf-keluar/{id}', [PetugasSuratKeluarController::class, 'previewPdf'])->name('petugas.suratKeluar.preview');

    // Route Disposisi
    Route::get('disposisi', [PetugasDisposisiController::class, 'index'])->name('petugas.disposisi.index');
    Route::get('disposisi/create', [PetugasDisposisiController::class, 'create'])->name('petugas.disposisi.create');
    Route::post('disposisi/create', [PetugasDisposisiController::class, 'store'])->name('petugas.disposisi.store');
    Route::delete('disposisi', [PetugasDisposisiController::class, 'destroy'])->name('petugas.disposisi.destroy');
    Route::get('disposisi-pdf/{id}', [PetugasDisposisiController::class, 'generate_pdf'])->name('petugas.disposisi.generatePdf');

    // Route Laporan Surat Masuk
    Route::get('laporan-surat-masuk', [PetugasLaporanSuratMasukController::class, 'index'])->name('petugas.laporanSuratMasuk.index');

    Route::get('laporan-preview-pdf/{id}', [PetugasLaporanSuratMasukController::class, 'previewPdf'])->name('petugas.laporansuratMasuk.preview');
    Route::get('laporan-surat-masuk/pdf', [PetugasLaporanSuratMasukController::class, 'generatePDF'])->name('petugas.laporanSuratMasuk.pdf');
    Route::get('laporan-surat-masuk/bulan-ini/pdf', [PetugasLaporanSuratMasukController::class, 'cetakBulanIni'])->name('petugas.bulanIni.pdf');
    Route::get('laporan-surat-masuk/minggu-ini/pdf', [PetugasLaporanSuratMasukController::class, 'cetakMingguIni'])->name('petugas.mingguIni.pdf');
    Route::get('laporan-surat-masuk/hari-ini/pdf', [PetugasLaporanSuratMasukController::class, 'cetakHariIni'])->name('petugas.hariIni.pdf');
    Route::get('laporan-surat-masuk/bulan-kemarin/pdf', [PetugasLaporanSuratMasukController::class, 'cetakBulanKemarin'])->name('petugas.bulanKemarin.pdf');
    Route::get('laporan-surat-masuk/kemarin/pdf', [PetugasLaporanSuratMasukController::class, 'cetakKemarin'])->name('petugas.kemarin.pdf');

    // Route Laporan Surat Masuk
    Route::get('laporan-surat-keluar', [PetugasLaporanSuratKeluarController::class, 'index'])->name('petugas.laporanSuratKeluar.index');

    Route::get('laporan-preview-pdf-keluar/{id}', [PetugasLaporanSuratKeluarController::class, 'previewPdf'])->name('petugas.laporansuratKeluar.preview');
    Route::get('laporan-surat-keluar/pdf', [PetugasLaporanSuratKeluarController::class, 'generatePDF'])->name('petugas.laporanSuratKeluar.pdf');
    Route::get('laporan-surat-keluar/bulan-ini/pdf', [PetugasLaporanSuratKeluarController::class, 'cetakBulanIni'])->name('petugas.bulanIniKeluar.pdf');
    Route::get('laporan-surat-keluar/minggu-ini/pdf', [PetugasLaporanSuratKeluarController::class, 'cetakMingguIni'])->name('petugas.mingguIniKeluar.pdf');
    Route::get('laporan-surat-keluar/hari-ini/pdf', [PetugasLaporanSuratKeluarController::class, 'cetakHariIni'])->name('petugas.hariIniKeluar.pdf');
    Route::get('laporan-surat-keluar/bulan-kemarin/pdf', [PetugasLaporanSuratKeluarController::class, 'cetakBulanKemarin'])->name('petugas.bulanKemarinKeluar.pdf');
    Route::get('laporan-surat-keluar/kemarin/pdf', [PetugasLaporanSuratKeluarController::class, 'cetakKemarin'])->name('petugas.kemarinKeluar.pdf');
});

Route::prefix('user')->middleware('role:user')->group(function(){
    Route::get('/', [UserDashboardController::class, 'index'])->name('user.dashboard');

    // Route Surat Masuk
    Route::get('surat_masuk', [UserSuratMasukController::class, 'index'])->name('user.suratMasuk.index');
    Route::get('surat_masuk/create', [UserSuratMasukController::class, 'create'])->name('user.suratMasuk.create');
    Route::post('surat_masuk/create', [UserSuratMasukController::class, 'store'])->name('user.suratMasuk.store');
    Route::get('surat_masuk/{id}', [UserSuratMasukController::class, 'edit'])->name('user.suratMasuk.edit');
    Route::put('surat_masuk/{id}', [UserSuratMasukController::class, 'update'])->name('user.suratMasuk.update');
    Route::delete('surat_masuk', [UserSuratMasukController::class, 'destroy'])->name('user.suratMasuk.destroy');
    Route::get('preview-pdf/{id}', [UserSuratMasukController::class, 'previewPdf'])->name('user.suratMasuk.preview');

    // Route Surat Keluar
    Route::get('surat_keluar', [UserSuratKeluarController::class, 'index'])->name('user.suratKeluar.index');
    Route::get('surat_keluar/create', [UserSuratKeluarController::class, 'create'])->name('user.suratKeluar.create');
    Route::post('surat_keluar/create', [UserSuratKeluarController::class, 'store'])->name('user.suratKeluar.store');
    Route::get('surat_keluar/{id}', [UserSuratKeluarController::class, 'edit'])->name('user.suratKeluar.edit');
    Route::put('surat_keluar/{id}', [UserSuratKeluarController::class, 'update'])->name('user.suratKeluar.update');
    Route::delete('surat_keluar', [UserSuratKeluarController::class, 'destroy'])->name('user.suratKeluar.destroy');
    Route::get('preview-pdf-keluar/{id}', [UserSuratKeluarController::class, 'previewPdf'])->name('user.suratKeluar.preview');
});

Route::get('', [AuthController::class, 'login_page'])->name('login.page')->middleware('isAuth');
Route::post('login', [AuthController::class, 'login'])->name('login.store')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');