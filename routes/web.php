<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PacienteController;

Route::view('/menuPaciente', 'menuPaciente')->name('menuPaciente');
Route::view('/register', 'register')->name('register');
Route::view('/login', 'login')->name('login');
Route::get('/infoPadres', [PacienteController::class, 'mostrarHijos'])->middleware('auth')->name('infoPadres');
Route::view('/registroHijos', 'registroHijos')->middleware('auth')->name('registroHijos');
Route::get('/', function () {
    return view('login');
});

Route::post('/register', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/login', [LoginController::class, 'login'])->name('logearse');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/registroHijos', [PacienteController::class, 'registrar'])->name('registrar')->middleware('auth');

Route::post('/infoPadres', [PacienteController::class, 'modificarPadre'])->name('modificarPadre')->middleware('auth');