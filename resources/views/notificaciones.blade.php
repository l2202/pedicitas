@extends('layouts.menuDoctor')

@section('content')

  <div class="container py-5">

    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">

        <div class="card shadow">
          <div class="card-body p-4">

            <h2 class="text-center mb-4">Agregar notificación</h2>

            <form
              action="{{ route('guardarNotificacion') }}"
              method="POST">
              @csrf
              <div class="mb-3">
                <label class="form-label d-block">Para</label>

                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="para"
                    id="ninos"
                    value="Masculino">
                  <label class="form-check-label" for="ninos">
                    Niños
                  </label>
                </div>

                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="para"
                    id="ninas"
                    value="Femenino">
                  <label class="form-check-label" for="ninas">
                    Niñas
                  </label>
                </div>

                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="para"
                    id="todos"
                    value="Todos"
                    checked>
                  <label class="form-check-label" for="todos">
                    Todos
                  </label>
                </div>
              </div>

              <div class="mb-3">
                <label for="edad" class="form-label">A la edad de</label>
                <select class="form-select" id="edad" name="edad" required>
                  <option value="">Selecciona la edad</option>
                  <option value="1">1 mes</option>
                  <option value="2">2 meses</option>
                  <option value="3">3 meses</option>
                  <option value="4">4 meses</option>
                  <option value="6">6 meses</option>
                  <option value="9">9 meses</option>
                  <option value="10">10 meses</option>
                  <option value="11">11 meses</option>
                  <option value="12">1 año</option>
                  <option value="18">1.5 años</option>
                  <option value="24">2 años</option>
                  <option value="30">2.5 años</option>
                  <option value="36">3 años</option>
                  <option value="42">3.5 años</option>
                  <option value="48">4 años</option>
                  <option value="54">4.5 años</option>
                  <option value="60">5 años</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">
                  Título del correo
                </label>

                <input
                  type="text"
                  name="titulo"
                  class="form-control">
              </div>
              <div class="mb-3">
                <label for="mensaje" class="form-label">Mensaje</label>
                <select class="form-select mb-2" id="mensaje">
                  <option value="">Selecciona una plantilla</option>
                  <option value="vacuna">Recordatorio de vacuna</option>
                  <option value="consulta">Revisión pediátrica</option>
                  <option value="alimentacion">Consejo de alimentación</option>
                  <option value="crecimiento">Control de crecimiento</option>
                </select>

                <textarea
                  class="form-control"
                  rows="4"
                  name="mensaje"
                  placeholder="Escribe aquí el mensaje de la notificación"></textarea>
              </div>

              <div class="text-center mt-4">
                <button type="submit" class="btn btn-success px-4">
                  Subir notificación
                </button>
              </div>

            </form>

            <div class="text-center mt-3">
              <a href="inicio.html" class="btn btn-outline-secondary">
                Volver al inicio
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