<?php
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

         return redirect(route('infoPadres'));

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
        if ($request->nombre) {
            $padre->nombre = $request->nombre;
        }
        if ($request->appa) {
            $padre->appa = $request->appa;
        }
        if ($request->apma) {
            $padre->apma = $request->apma;
        }

        $padre->save();

        return redirect(route('infoPadres'));
    }
}
?>

