<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AktivitasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

URL::forceScheme('https');  

Route::get('/', function () {
    return redirect()->route(Auth::check() ? 'home' : 'login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil')->middleware('auth');
Route::get('/daftar', [HomeController::class, 'daftar'])->name('daftar')->middleware('auth');
Route::resource('aktivitas', AktivitasController::class);
Route::get('/form', [AktivitasController::class, 'index'])->name('form')->middleware('auth');
Route::get('/toggleStatus', [AktivitasController::class, 'updateStatus'])->name('aktivitas.toggle')->middleware('auth');
Route::get('/printPdf', [AktivitasController::class, 'generatePdf'])->name('aktivitas.cetak')->middleware('auth');
