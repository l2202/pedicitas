<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificacionEnviada extends Model
{
    protected $table = 'notificaciones_enviadas';

    protected $fillable = [
        'regla_id',
        'paciente_id',
        'sent_at'
    ];
}
