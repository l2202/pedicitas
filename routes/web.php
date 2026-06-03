<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\NotificacionController;

Route::view('/menuPaciente', 'menuPaciente')
    ->name('menuPaciente');
Route::view('/register', 'register')
    ->name('register');
Route::view('/login', 'login')
    ->name('login');
Route::get('/infoPadres', [PacienteController::class, 'mostrarHijos'])
    ->middleware(['auth', 'padre'])
    ->name('infoPadres');
Route::view('/agendaDoc', 'agendaDoc')
    ->middleware(['auth', 'doctor'])
    ->name('agendaDoc');
Route::view('/registroHijos', 'registroHijos')
    ->middleware(['auth', 'padre'])
    ->name('registroHijos');
Route::get('/', function () {
    return view('login');
});

Route::post('/register', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/login', [LoginController::class, 'login'])->name('logearse');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/registroHijos', [PacienteController::class, 'registrar'])->name('registrar')->middleware('auth');

Route::post('/infoPadres', [PacienteController::class, 'modificarPadre'])->name('modificarPadre')->middleware('auth');

Route::get('/offline', function () {
    return view('vendor.laravelpwa.offline');
})->name('offline');

Route::post(
    '/notificaciones',
    [NotificacionController::class, 'guardar']
)
    ->middleware(['auth', 'doctor'])
    ->name('guardarNotificacion');
Route::get(
    '/notificaciones',
    function () {
        return view('notificaciones');
    }
)
    ->middleware(['auth', 'doctor'])
    ->name('notificaciones');
