<?php
<<<<<<< HEAD
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Paciente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller{

    public function registrar(Request $request){
        $paciente=new Paciente();
        $paciente->user_id = Auth::id(); //Para saber quien registra al niño
        $paciente->nombre=$request->nomHijo;
        $paciente->appa=$request->apPat;
        $paciente->apma=$request->apMat;
        $paciente->fecha_nacimiento=$request->fechaNacimiento;
        $paciente->sexo=$request->sexo;
        $paciente->alergias=$request->alergias;
        $paciente->save();

         return redirect(route('menuPaciente'));

    }

    public function mostrarHijos(){
        $padre=Auth::user();
        $hijos=Paciente::where('user_id', Auth::id())->get();
        return view('infoPadres', compact('padre','hijos'));
    }
    public function modificarPadre(Request $request)
    {
        $padre = Auth::user();

        if ($request->email) {
            $padre->email = $request->email;
        }

        if ($request->telefono) {
            $padre->telefono = $request->telefono;
        }

        $padre->save();

        return redirect(route('infoPadres'));
    }
}
?>
=======

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
>>>>>>> d8b37a0100c18881527a903965204bf90475ab1a
