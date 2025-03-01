<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route(Auth::check() ? 'dashboard' : 'login');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/daftar', [HomeController::class, 'daftar'])->name('daftar');
Route::get('/form', [HomeController::class, 'form'])->name('form');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');