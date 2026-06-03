<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotificacionRegla;

class NotificacionController extends Controller
{
    public function guardar(Request $request)
    {
        NotificacionRegla::create([
            'sexo' => $request->para,
            'edad_meses' => $request->edad,
            'titulo' => $request->titulo,
            'mensaje' => $request->mensaje,
            'activo' => true
        ]);

        return back()
            ->with('success', 'Notificación creada');
    }
}
