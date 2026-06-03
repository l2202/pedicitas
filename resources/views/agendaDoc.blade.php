@extends('layouts.menuDoctor')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  @laravelPWA
</head>

<body class="bg-light">

  <div class="container py-5">

    <div class="row justify-content-center">
      <div class="col-md-7">

        <div class="card shadow">
          <div class="card-body p-4">

            <h2 class="text-center mb-4">Agenda</h2>

            <form method="POST" action="{{ route('guardarHorario') }}">
              @csrf

              <div class="row mb-3 align-items-center">
                <div class="col-md-3">
                  <label for="dia" class="form-label mb-0">Día</label>
                </div>

                <div class="col-md-9">
                  <input 
                    type="date" 
                    class="form-control" 
                    id="dia"
                    name="dia"
                    value="{{ request('dia') }}"
                    min="{{ date('Y-m-d') }}"
                    required
                  >
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-md-3">
                  <label for="hora" class="form-label mb-0">Hora</label>
                </div>

                <div class="col-md-9">
                  <select class="form-select" id="hora" name="hora" required>
                    <option value="">Selecciona una hora</option>
                    <option value="08:00">08:00 AM</option>
                    <option value="09:00">09:00 AM</option>
                    <option value="10:00">10:00 AM</option>
                    <option value="11:00">11:00 AM</option>
                    <option value="12:00">12:00 PM</option>
                    <option value="13:00">01:00 PM</option>
                    <option value="14:00">02:00 PM</option>
                    <option value="15:00">03:00 PM</option>
                    <option value="16:00">04:00 PM</option>
                    <option value="17:00">05:00 PM</option>
                    <option value="18:00">06:00 PM</option>
                    <option value="19:00">07:00 PM</option>
                    <option value="20:00">08:00 PM</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-md-3">
                  <label class="form-label mb-0">Estado</label>
                </div>

                <div class="col-md-9">

                  <div class="form-check">
                    <input 
                      class="form-check-input" 
                      type="radio" 
                      name="estado" 
                      id="disponible" 
                      value="disponible"
                      required
                    >
                    <label class="form-check-label" for="disponible">
                      Disponible
                    </label>
                  </div>

                  <div class="form-check">
                    <input 
                      class="form-check-input" 
                      type="radio" 
                      name="estado" 
                      id="no_disponible" 
                      value="no_disponible"
                      required
                    >
                    <label class="form-check-label" for="no_disponible">
                      No disponible
                    </label>
                  </div>

                </div>
              </div>

              <p class="text-warning fw-bold mb-4">
                Selecciona una fecha, hora y estado para modificar la agenda.
              </p>

              <div class="d-flex justify-content-center mb-4">
                <button type="submit" class="btn btn-primary">
                  Guardar horario
                </button>
              </div>

            </form>

            <hr>

            <h5 class="mb-3">Horarios del día</h5>

            @if(!request('dia'))
              <p class="text-muted">
                Selecciona una fecha para ver los horarios de ese día.
              </p>
            @else
              <p class="text-muted">
                Horarios para el día: <strong>{{ request('dia') }}</strong>
              </p>
            @endif

            <div class="d-flex flex-wrap gap-3 mb-4">

              @php
                $horas = [
                  '08:00' => '08:00 AM',
                  '09:00' => '09:00 AM',
                  '10:00' => '10:00 AM',
                  '11:00' => '11:00 AM',
                  '12:00' => '12:00 PM',
                  '13:00' => '01:00 PM',
                  '14:00' => '02:00 PM',
                  '15:00' => '03:00 PM',
                  '16:00' => '04:00 PM',
                  '17:00' => '05:00 PM',
                  '18:00' => '06:00 PM',
                  '19:00' => '07:00 PM',
                  '20:00' => '08:00 PM',
                ];

                $fechaSeleccionada = request('dia');
              @endphp

              @foreach($horas as $valor => $texto)

                @php
                  $estado = 'sin_fecha';

                  if ($fechaSeleccionada) {
                    $estado = 'no_registrado';

                    foreach($horarios as $horario) {
                      if(substr($horario->hora_inicio, 0, 5) == $valor) {
                        $estado = $horario->estado;
                      }
                    }
                  }

                  if(!$fechaSeleccionada) {
                    $clase = 'btn-secondary';
                  } elseif($estado == 'disponible') {
                    $clase = 'btn-success';
                  } elseif($estado == 'no_disponible') {
                    $clase = 'btn-secondary';
                  } elseif($estado == 'cita') {
                    $clase = 'btn-danger';
                  } else {
                    $clase = 'btn-outline-secondary';
                  }
                @endphp

                <button 
                  type="button" 
                  class="btn {{ $clase }} px-4 boton-hora" 
                  data-hora="{{ $valor }}"
                >
                  {{ $texto }}
                </button>

              @endforeach

            </div>

            <div class="mb-4">
              <p class="mb-1">
                <span class="badge bg-success">Verde</span> Hora disponible
              </p>

              <p class="mb-1">
                <span class="badge bg-warning text-dark">Amarillo</span> Hora seleccionada
              </p>

              <p class="mb-1">
                <span class="badge bg-danger">Rojo</span> Hora ocupada con cita
              </p>

              <p class="mb-0">
                <span class="badge bg-secondary">Gris</span> Hora no disponible o sin fecha seleccionada
              </p>
            </div>

          </div>
        </div>

      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    document.getElementById('dia').addEventListener('change', function () {
      if (this.value) {
        window.location.href = "{{ route('agendaDoc') }}" + "?dia=" + this.value;
      }
    });

    document.querySelectorAll('.boton-hora').forEach(function(boton) {
      boton.addEventListener('click', function() {
        let fecha = document.getElementById('dia').value;

        if (!fecha) {
          alert('Primero selecciona una fecha');
          return;
        }

        document.getElementById('hora').value = this.dataset.hora;

        document.querySelectorAll('.boton-hora').forEach(function(b) {
          b.classList.remove('btn-warning');

          let original = b.getAttribute('data-original-class');

          if (original) {
            b.classList.add(original);
          }
        });

        if (!this.getAttribute('data-original-class')) {
          if (this.classList.contains('btn-success')) {
            this.setAttribute('data-original-class', 'btn-success');
          } else if (this.classList.contains('btn-secondary')) {
            this.setAttribute('data-original-class', 'btn-secondary');
          } else if (this.classList.contains('btn-danger')) {
            this.setAttribute('data-original-class', 'btn-danger');
          } else if (this.classList.contains('btn-outline-secondary')) {
            this.setAttribute('data-original-class', 'btn-outline-secondary');
          }
        }

        this.classList.remove('btn-success', 'btn-secondary', 'btn-danger', 'btn-outline-secondary');
        this.classList.add('btn-warning');
      });
    });
  </script>

</body>
</html>
@endsection