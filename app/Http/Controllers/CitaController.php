<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Paciente;
use App\Models\Cita;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    public function mostrar(Request $request)
    {
        $pacientes = Paciente::where('user_id', Auth::id())->get();

        $horarios = collect();

        if ($request->dia) {
            $horarios = Horario::where('fecha', $request->dia)->get();
        }

        $citasCanceladas = Cita::with('horario', 'paciente')
            ->where('status', 'cancelada')
            ->whereHas('paciente', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->get();

        return view('agendarCita', compact('horarios', 'pacientes', 'citasCanceladas'));
    }
    public function guardar(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required',
            'horario_id' => 'required',
        ]);

        $horario = Horario::find($request->horario_id);

        if (!$horario) {
            return redirect(route('agendarCita'))->with('error', 'El horario no existe.');
        }

        if ($horario->estado != 'disponible') {
            return redirect(route('agendarCita'))->with('error', 'Ese horario no está disponible.');
        }

        $cita = new Cita();

        $cita->paciente_id = $request->paciente_id;
        $cita->horario_id = $request->horario_id;
        $cita->status = 'agendada';

        $cita->save();

        $horario->estado = 'cita';
        $horario->save();

        return redirect(route('agendarCita'))->with('success', 'Cita agendada correctamente.');
    }

    public function citasDoctor()
    {
        $citas = Cita::with('paciente', 'horario')
            ->where('status', 'agendada')
            ->get();

        return view('citasDoctor', compact('citas'));
    }

    public function cancelarDoctor($id)
    {
        $cita = Cita::find($id);

        if (!$cita) {
            return back()->with('error', 'La cita no existe.');
        }

        $horario = Horario::find($cita->horario_id);

        if ($horario) {
            $horario->estado = 'disponible';
            $horario->save();
        }

        $cita->status = 'cancelada';
        $cita->save();

        return back()->with('success', 'Cita cancelada correctamente.');
    }

    public function citasPadre()
    {
        $citas = Cita::with('paciente', 'horario')
            ->whereHas('paciente', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('padreCitas', compact('citas'));
    }
}
