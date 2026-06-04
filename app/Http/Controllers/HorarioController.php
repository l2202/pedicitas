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

    public function disponibilizarDia(Request $request)
    {
        $horas = [
            '08:00' => '09:00',
            '09:00' => '10:00',
            '10:00' => '11:00',
            '11:00' => '12:00',
            '12:00' => '13:00',
            '13:00' => '14:00',
            '14:00' => '15:00',
            '15:00' => '16:00',
            '16:00' => '17:00',
            '17:00' => '18:00',
            '18:00' => '19:00',
            '19:00' => '20:00',
            '20:00' => '21:00',
        ];

        foreach ($horas as $inicio => $fin) {

            $horario = Horario::firstOrNew([ //
                'fecha' => $request->dia,
                'hora_inicio' => $inicio
            ]);

            // No modificar citas ya ocupadas
            if ($horario->estado === 'cita') {
                continue;
            }

            $horario->fecha = $request->dia;
            $horario->hora_inicio = $inicio;
            $horario->hora_fin = $fin;
            $horario->estado = 'disponible';

            $horario->save();
        }

        return redirect()
            ->route('agendaDoc', ['dia' => $request->dia])
            ->with('success', 'Todos los horarios fueron marcados como disponibles');
    }
}
