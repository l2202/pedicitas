<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::view('/register', 'register')->name('register');
Route::view('/login', 'login')->name('login');
Route::view('/infoPadres', 'infoPadres')->middleware('auth')->name('infoPadres');
Route::get('/', function () {
    return view('login');
});

Route::post('/register', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

