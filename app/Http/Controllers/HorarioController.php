<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;

class HorarioController extends Controller
{
    public function guardarHorario(Request $request)
    {
        $horaFin = '';

        if ($request->hora == '08:00') {
            $horaFin = '09:00';
        } elseif ($request->hora == '09:00') {
            $horaFin = '10:00';
        } elseif ($request->hora == '10:00') {
            $horaFin = '11:00';
        } elseif ($request->hora == '11:00') {
            $horaFin = '12:00';
        } elseif ($request->hora == '12:00') {
            $horaFin = '13:00';
        } elseif ($request->hora == '13:00') {
            $horaFin = '14:00';
        } elseif ($request->hora == '14:00') {
            $horaFin = '15:00';
        } elseif ($request->hora == '15:00') {
            $horaFin = '16:00';
        } elseif ($request->hora == '16:00') {
            $horaFin = '17:00';
        } elseif ($request->hora == '17:00') {
            $horaFin = '18:00';
        } elseif ($request->hora == '18:00') {
            $horaFin = '19:00';
        } elseif ($request->hora == '19:00') {
            $horaFin = '20:00';
        } elseif ($request->hora == '20:00') {
            $horaFin = '21:00';
        }

        $horario = Horario::where('fecha', $request->dia)
            ->where('hora_inicio', $request->hora)
            ->first();

        if (!$horario) {
            $horario = new Horario();
        }

        $horario->fecha = $request->dia;
        $horario->hora_inicio = $request->hora;
        $horario->hora_fin = $horaFin;
        $horario->estado = $request->estado;

        $horario->save();

        return redirect(route('agendaDoc'));
    }

    public function mostrarHorarios(Request $request)
    {
      
        $fecha = $request->dia;

        $horarios = collect();

        if ($fecha) {
            $horarios = Horario::where('fecha', $fecha)->get();
        }

        return view('agendaDoc', compact('horarios'));

        }
}