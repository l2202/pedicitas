<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Models\NotificacionRegla;
use App\Models\NotificacionEnviada;
use App\Models\Paciente;
use App\Notifications\Notificacion;
use Carbon\Carbon;

#[Signature('app:mandar-notificaciones')] //nomvre de comando
#[Description('Command description')]
class MandarNotificaciones extends Command
{
    /**
     * Execute the console command.
     */
    public function handle() //entra directo a este metodo
    {
        $this->info("Comando iniciado");

        $reglas = NotificacionRegla::where('activo', true)->get(); //busca las reglas activas
        $this->info("Reglas encontradas: " . $reglas->count()); //cuantas reglas encontro

        foreach ($reglas as $regla) {
            $this->info("Procesando regla " . $regla->id);

            $pacientes = Paciente::all(); //todos los pacientes y los cuenta
            $this->info("Pacientes encontrados: " . $pacientes->count());

            foreach ($pacientes as $paciente) {
                $edadMeses = (int)
                    Carbon::parse($paciente->fecha_nacimiento)
                    ->diffInMonths(now()); //extrae la fecha de nacimiento y cslcula la diferencia de meses con la fecha acatyal
                $this->info(
                    "Paciente: " . $paciente->nombre .
                        " | Edad: " . $edadMeses .
                        " | Regla: " . $regla->edad_meses
                );
                if ($edadMeses == $regla->edad_meses) {
                    if (
                        $regla->sexo == 'Todos' //revisa sexo
                        ||
                        $regla->sexo == $paciente->sexo
                    ) {
                        $yaEnviado =
                            NotificacionEnviada::where(
                                'regla_id',
                                $regla->id
                            )
                            ->where(
                                'paciente_id',
                                $paciente->id
                            )
                            ->exists();
                        if (!$yaEnviado) {
                            $padre = $paciente->user;

                            if (!$padre) {
                                continue;//saltar a otro
                            }
                            try {
                                $padre->notify(
                                    new Notificacion(
                                        $regla->titulo,
                                        $regla->mensaje
                                    )
                                );
                                $this->info(
                                    "Correo enviado a: "
                                        . $padre->email
                                ); //si se manda muestra esto
                                NotificacionEnviada::create([ //guardar en tabla
                                    'regla_id' => $regla->id,
                                    'paciente_id' => $paciente->id,
                                    'sent_at' => now() //guarda decha y hora
                                ]);
                            } catch (\Exception $e) {

                                $this->error(
                                    "Error enviando correo a " . $padre->email //por si no se manda
                                );
                            }
                        }
                    }
                }
            }
        }
    }
}
