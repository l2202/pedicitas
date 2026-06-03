<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\CitaController;


Route::get('/', function () {
    return view('login');
});

Route::view('/register', 'register')->name('register');

Route::view('/login', 'login')->name('login');

Route::post('/register', [LoginController::class, 'register'])
    ->name('validar-registro');

Route::post('/login', [LoginController::class, 'login'])
    ->name('logearse');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');


Route::get('/infoPadres', [PacienteController::class, 'mostrarHijos'])
    ->middleware(['auth', 'padre'])
    ->name('infoPadres');

Route::post('/infoPadres', [PacienteController::class, 'modificarPadre'])
    ->middleware(['auth', 'padre'])
    ->name('modificarPadre');

Route::view('/registroHijos', 'registroHijos')
    ->middleware(['auth', 'padre'])
    ->name('registroHijos');

Route::post('/registroHijos', [PacienteController::class, 'registrar'])
    ->middleware(['auth', 'padre'])
    ->name('registrar');

Route::get('/agendarCita', [CitaController::class, 'mostrar'])
    ->middleware(['auth', 'padre'])
    ->name('agendarCita');

Route::post('/agendarCita', [CitaController::class, 'guardar'])
    ->middleware(['auth', 'padre'])
    ->name('guardarCita');


Route::get('/agendaDoc', [HorarioController::class, 'mostrarHorarios'])
    ->middleware(['auth', 'doctor'])
    ->name('agendaDoc');

Route::post('/agendaDoc', [HorarioController::class, 'guardarHorario'])
    ->middleware(['auth', 'doctor'])
    ->name('guardarHorario');

Route::get('/notificaciones', function () {
    return view('notificaciones');
})
    ->middleware(['auth', 'doctor'])
    ->name('notificaciones');

Route::post('/notificaciones', [NotificacionController::class, 'guardar'])
    ->middleware(['auth', 'doctor'])
    ->name('guardarNotificacion');

    Route::get('/citasDoctor', [CitaController::class, 'citasDoctor'])
    ->middleware(['auth', 'doctor'])
    ->name('citasDoctor');

Route::post('/cancelarCitaDoctor/{id}', [CitaController::class, 'cancelarDoctor'])
    ->middleware(['auth', 'doctor'])
    ->name('cancelarCitaDoctor');




Route::view('/menuPaciente', 'menuPaciente')
    ->name('menuPaciente');

Route::get('/offline', function () {
    return view('vendor.laravelpwa.offline');
})->name('offline');