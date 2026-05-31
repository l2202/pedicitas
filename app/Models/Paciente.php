<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{

    protected $fillable = [
        'user_id',
        'nombre',
        'appa',
        'apma',
        'fecha_nacimiento',
        'sexo',
        'alergias'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
