@extends('layouts.menuPadres')

@section('content')
  <div class="container py-5">

    <div class="row justify-content-center">
      <div class="col-md-8">

        <div class="card shadow">
          <div class="card-body p-4">

            <h2 class="text-center mb-4">Agendar una cita</h2>

            <form method="POST" action="{{ route('guardarCita') }}">
              @csrf

              <div class="mb-3">
                <label class="form-label">Selecciona el niño</label>
                <select name="paciente_id" class="form-select" required>
                  <option value="">Selecciona un niño</option>

                  @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">
                      {{ $paciente->nombre }}
                    </option>
                  @endforeach

                </select>
              </div>

              <div class="mb-3">
                <label for="dia" class="form-label">Selecciona el día de la cita</label>
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

              <input type="hidden" name="horario_id" id="horario_id" required>

              <div class="mb-3">
                <label class="form-label">Horario seleccionado</label>
                <input 
                  type="text" 
                  class="form-control" 
                  id="horario_texto" 
                  placeholder="Selecciona un horario de los botones"
                  readonly
                >
              </div>

              <hr class="my-4">

              <h5 class="mb-3">Horarios del día</h5>

              @if(!request('dia'))
                <p class="text-muted">
                  Selecciona una fecha para ver los horarios disponibles.
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
                    $horarioId = '';
                    $horaInicio = '';
                    $horaFin = '';
                    $cancelada = false;

                    if ($fechaSeleccionada) {
                      $estado = 'no_disponible';

                      foreach($horarios as $horario) {
                        if(substr($horario->hora_inicio, 0, 5) == $valor) {
                          $estado = $horario->estado;
                          $horarioId = $horario->id;
                          $horaInicio = substr($horario->hora_inicio, 0, 5);
                          $horaFin = substr($horario->hora_fin, 0, 5);
                        }
                      }

                      foreach($citasCanceladas as $citaCancelada) {
                        if($citaCancelada->horario && substr($citaCancelada->horario->hora_inicio, 0, 5) == $valor) {
                          $cancelada = true;
                        }
                      }
                    }

                    if(!$fechaSeleccionada) {
                      $clase = 'btn-secondary';
                      $disabled = 'disabled';
                    } elseif($cancelada) {
                      $clase = 'btn-danger';
                      $disabled = 'disabled';
                    } elseif($estado == 'disponible') {
                      $clase = 'btn-success';
                      $disabled = '';
                    } else {
                      $clase = 'btn-secondary';
                      $disabled = 'disabled';
                    }
                  @endphp

                  <button 
                    type="button" 
                    class="btn {{ $clase }} px-4 boton-hora"
                    data-id="{{ $horarioId }}"
                    data-hora="{{ $texto }}"
                    data-inicio="{{ $horaInicio }}"
                    data-fin="{{ $horaFin }}"
                    {{ $disabled }}
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
                  <span class="badge bg-danger">Rojo</span> Cita cancelada
                </p>

                <p class="mb-0">
                  <span class="badge bg-secondary">Gris</span> Hora no disponible, con cita o sin fecha seleccionada
                </p>
              </div>

              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">
                  Agendar cita
                </button>
              </div>

            </form>

            <div class="text-center mt-4">
              <a href="{{ route('infoPadres') }}" class="btn btn-outline-secondary">
                Volver al inicio
              </a>
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
        window.location.href = "{{ route('agendarCita') }}" + "?dia=" + this.value;
      }
    });

    document.querySelectorAll('.boton-hora').forEach(function(boton) {
      boton.addEventListener('click', function() {
        let horarioId = this.dataset.id;
        let horaTexto = this.dataset.hora;
        let horaInicio = this.dataset.inicio;
        let horaFin = this.dataset.fin;

        if (!horarioId) {
          alert('Este horario no está disponible');
          return;
        }

        document.getElementById('horario_id').value = horarioId;

        if (horaInicio && horaFin) {
          document.getElementById('horario_texto').value = horaInicio + ' a ' + horaFin;
        } else {
          document.getElementById('horario_texto').value = horaTexto;
        }

        document.querySelectorAll('.boton-hora').forEach(function(b) {
          b.classList.remove('btn-warning');

          let original = b.getAttribute('data-original-class');

          if (original) {
            b.classList.remove('btn-success', 'btn-secondary', 'btn-danger', 'btn-outline-secondary');
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
@endsection