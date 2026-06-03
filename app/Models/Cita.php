<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Cita extends Model
{

    protected $fillable = [
        'paciente_id',
        'horario_id',
        'horario_id',
        'estado'
    ];


    
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }
}
