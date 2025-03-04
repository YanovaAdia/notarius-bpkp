<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');
Route::get('/daftar', [HomeController::class, 'daftar'])->name('daftar')->middleware('auth');
Route::get('/form', [HomeController::class, 'form'])->name('form')->middleware('auth');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil')->middleware('auth');