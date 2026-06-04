@extends('layouts.menuPadres')

@section('content')
<div class="container py-4">

    <h2 class="mb-4">Mis citas</h2>

    @if($citas->isEmpty())
    <div class="alert alert-info">
        No tienes citas registradas.
    </div>
    @else
    <div class="table">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Paciente</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Estado</th>
                </tr>
            </thead>

            <tbody>
                @foreach($citas as $cita)
                <tr>
                    <td>
                        {{ $cita->paciente->nombre }}
                    </td>

                    <td>
                        {{ $cita->horario->fecha }}
                    </td>

                    <td>
                        {{ substr($cita->horario->hora_inicio,0,5) }}
                    </td>

                    <td>
                        @if($cita->status == 'agendada')
                        <span class="badge bg-success">
                            Agendada
                        </span>
                        @else
                        <span class="badge bg-danger">
                            Cancelada por el doctor
                        </span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    @endif

</div>
@endsection