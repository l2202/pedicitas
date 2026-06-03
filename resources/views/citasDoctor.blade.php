@extends('layouts.menuDoctor')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Citas agendadas</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  @laravelPWA
</head>

<body class="bg-light">

  <div class="container py-5">

    <div class="row justify-content-center">
      <div class="col-md-10">

        <div class="card shadow">
          <div class="card-body p-4">

            <h2 class="text-center mb-4">Citas agendadas</h2>

            @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            @if(session('error'))
              <div class="alert alert-danger">
                {{ session('error') }}
              </div>
            @endif

            @if($citas->count() == 0)

              <div class="alert alert-info text-center">
                No hay citas agendadas.
              </div>

            @else

              <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                  <thead class="table-dark">
                    <tr>
                      <th>#</th>
                      <th>Paciente</th>
                      <th>Fecha</th>
                      <th>Hora</th>
                      <th>Estado</th>
                      <th>Acción</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($citas as $cita)
                      <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                          {{ $cita->paciente->nombre ?? 'Sin nombre' }}
                          {{ $cita->paciente->appa ?? '' }}
                          {{ $cita->paciente->apma ?? '' }}
                        </td>

                        <td>
                          {{ $cita->horario->fecha ?? 'Sin fecha' }}
                        </td>

                        <td>
                          {{ $cita->horario->hora_inicio ?? '' }}
                          a
                          {{ $cita->horario->hora_fin ?? '' }}
                        </td>

                        <td>
                          <span class="badge bg-primary">
                            {{ $cita->status }}
                          </span>
                        </td>

                        <td>
                          <form method="POST" action="{{ route('cancelarCitaDoctor', $cita->id) }}">
                            @csrf

                            <button type="submit" class="btn btn-danger btn-sm">
                              Cancelar cita
                            </button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

            @endif

            <div class="text-center mt-4">
              <a href="{{ route('agendaDoc') }}" class="btn btn-outline-secondary">
                Volver a la agenda
              </a>
            </div>

          </div>
        </div>

      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
@endsection