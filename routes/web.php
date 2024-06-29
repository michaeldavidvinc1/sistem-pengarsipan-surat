<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Petugas\PetugasDashboardController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware('role:admin')->group(function(){
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

Route::prefix('petugas')->middleware('role:petugas')->group(function(){
    Route::get('/', [PetugasDashboardController::class, 'index'])->name('petugas.dashboard');
});

Route::prefix('user')->middleware('role:user')->group(function(){
    Route::get('/', [UserDashboardController::class, 'index'])->name('suer.dashboard');
});

Route::get('', [AuthController::class, 'login_page'])->name('login.page')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->name('login.store')->middleware('guest');