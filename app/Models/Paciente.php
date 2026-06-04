<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Paciente extends Model
{
    use HasFactory;
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
