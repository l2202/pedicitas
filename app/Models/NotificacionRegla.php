<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificacionRegla extends Model
{
    protected $fillable = [
        'sexo',
        'edad_meses',
        'titulo',
        'mensaje',
        'activo'
    ];
}
