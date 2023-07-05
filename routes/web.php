<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SessionController::class, 'index'])->middleware('isTamu');
Route::post('sesi/login', [SessionController::class, 'login'])->middleware('isTamu'); 
Route::get('sesi/logout', [SessionController::class, 'logout'])->middleware('isLogin');

// Route yang hanya bisa diakses ketika sudah login
Route::middleware(['isLogin'])->group(function () {
    Route::resource('alternatif', AlternatifController::class);
    Route::get('/moora/hasil', [PerhitunganController::class, 'hasil'])->name('moora.hasil');
    Route::get('/moora/laporan', [PerhitunganController::class, 'laporan'])->name('moora.laporan');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('user.editProfile');
    Route::put('/users/{user}/update-profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
});

// Route hanya bisa diakses oleh Operator (is_admin = 1)
Route::middleware(['isLogin', 'isAdmin'])->group(function () {
    // Route::resource('alternatif', AlternatifController::class)->except(['index', 'show']);
    Route::resource('user', UserController::class)->parameter('user', 'user');
});

// Route hanya bisa diakses oleh Decision Maker (is_admin = 0)
Route::middleware(['isLogin', 'isUser'])->group(function () {
    Route::resource('kriteria', KriteriaController::class)->parameter('kriteria', 'kriteria');
    Route::resource('subkriteria', SubKriteriaController::class)->parameter('subkriteria', 'subkriteria');
    Route::get('/moora', [PerhitunganController::class, 'index'])->name('moora.index');
    // Route::get('alternatif', [AlternatifController::class, 'index'])->name('alternatif.index');
    // Route::get('alternatif/create', [AlternatifController::class, 'create'])->name('alternatif.create');
    // Route::post('alternatif', [AlternatifController::class, 'store'])->name('alternatif.store');
    // Route::get('alternatif/{alternatif}', [AlternatifController::class, 'show'])->name('alternatif.show');
    // Route::get('alternatif/{alternatif}/edit', [AlternatifController::class, 'edit'])->name('alternatif.edit');
    // Route::put('alternatif/{alternatif}', [AlternatifController::class, 'update'])->name('alternatif.update');
    // Route::delete('alternatif/{alternatif}', [AlternatifController::class, 'destroy'])->name('alternatif.destroy');    
});

