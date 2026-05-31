<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    public function cita()
    {
        return $this->hasOne(Cita::class);
    }
}
