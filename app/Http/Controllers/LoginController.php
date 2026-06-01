<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->nombre = $request->nombre;
        $user->appa = $request->paterno;
        $user->apma = $request->materno;
        $user->sexo = $request->sexo;
        $user->telefono = $request->telefono;
        $user->cumple = $request->fechaNacimiento;
        $user->save();

        Auth::login($user);
        return redirect(route('menuPaciente'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('logearse'));
    }


    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $remember = $request->has('remember') ? true : false;
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            if (Auth::user()->rol == 'doctor') {
                return redirect(route('agendaDoc'));
            }
            return redirect(route('infoPadres'));
        } else {
            return redirect(route('logearse'));
        }
    }
}
//hola