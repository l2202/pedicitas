<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda </title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  @laravelPWA
</head>

<body class="bg-light">

  <div class="container py-5">

    <div class="row justify-content-center">
      <div class="col-md-7">

        <div class="card shadow">
          <div class="card-body p-4">

            <h2 class="text-center mb-4">Agenda </h2>

            <form>

              <div class="row mb-3 align-items-center">
                <div class="col-md-3">
                  <label for="dia" class="form-label mb-0">Día</label>
                </div>

                <div class="col-md-9">
                  <input 
                    type="date" 
                    class="form-control" 
                    id="dia"
                    required
                  >
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-md-3">
                  <label for="hora" class="form-label mb-0">Hora</label>
                </div>

                <div class="col-md-9">
                  <select class="form-select" id="hora" required>
                    <option value="">Selecciona una hora</option>
                    <option value="08:00">08:00</option>
                    <option value="09:00">09:00</option>
                    <option value="10:00">10:00</option>
                    <option value="11:00">11:00</option>
                    <option value="12:00">12:00</option>
                    <option value="13:00">13:00</option>
                  </select>
                </div>
              </div>

              <p class="text-warning fw-bold mb-4">
                La hora está ocupada
              </p>

              <hr>

              <h5 class="mb-3">Horarios del día</h5>

              <div class="d-flex flex-wrap gap-3 mb-4">

                <button type="button" class="btn btn-secondary px-4">
                  08:00
                </button>

                <button type="button" class="btn btn-warning px-4">
                  09:00
                </button>

                <button type="button" class="btn btn-success px-4">
                  10:00
                </button>

                <button type="button" class="btn btn-success px-4">
                  11:00
                </button>

                <button type="button" class="btn btn-danger px-4">
                  12:00
                </button>



              </div>

              <div class="mb-4">
                <p class="mb-1">
                  <span class="badge bg-success">Verde</span> Hora disponible
                </p>

                <p class="mb-1">
                  <span class="badge bg-warning text-dark">Amarillo</span> Hora seleccionada
                </p>

                <p class="mb-1">
                  <span class="badge bg-danger">Rojo</span> Hora ocupada
                </p>

                <p class="mb-0">
                  <span class="badge bg-secondary">Gris</span> Hora no disponible
                </p>
              </div>

              <div class="d-flex flex-wrap gap-3 justify-content-center">

                <button type="button" class="btn btn-success">
                  Marcar como disponible
                </button>

                <button type="button" class="btn btn-danger">
                  Cancelar cita
                </button>

                <button type="button" class="btn btn-warning">
                  Modificar cita
                </button>

              </div>

            </form>

            <div class="text-center mt-4">
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