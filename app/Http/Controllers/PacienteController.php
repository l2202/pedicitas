<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller
{

    public function store(Request $request)
    {
        Paciente::create([
            //'user_id'=> auth()->id(),
            'nombre'=> $request->nombre,
            'ap_paterno'=> $request->ap_paterno,
            'ap_materno'=> $request->ap_materno,
            'fecha_nacimiento'=> $request->fecha_nacimiento,
            'sexo'=> $request->sexo,
            'alergias'=> $request->alergias,
        ]);

        return redirect()->back();
    }
}
