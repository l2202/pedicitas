<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agendar cita</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  @laravelPWA
</head>

<body class="bg-light">

  <div class="container py-5">

    <div class="row justify-content-center">
      <div class="col-md-7">

        <div class="card shadow">
          <div class="card-body p-4">

            <h2 class="mb-4">Agendar una cita</h2>

            <form>

              <div class="row mb-3 align-items-center">
                <div class="col-md-3">
                  <label for="dia" class="form-label mb-0">Día</label>
                </div>
                <div class="col-md-6">
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
                <div class="col-md-6">
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

              <p class="text-success fw-bold mb-3">
                La hora está libre
              </p>

              <div class="row mb-4 align-items-center">
                <div class="col-md-3">
                  <label for="paciente" class="form-label mb-0">Paciente</label>
                </div>
                <div class="col-md-6">
                  <select class="form-select" id="paciente" required>
                    <option value="">Selecciona un paciente</option>
                    <option value="Maritza">Maritza Hernández</option>
                    <option value="Enrique">Enrique Hurtado</option>
                  </select>
                </div>
              </div>

              <button type="submit" class="btn btn-success px-4">
                Reservar cita
              </button>

            </form>

            <hr class="my-4">

            <h5 class="mb-3">Horarios disponibles</h5>

            <div class="d-flex flex-wrap gap-3">

              <button class="btn btn-secondary">
                08:00
              </button>

              <button class="btn btn-success">
                09:00
              </button>

              <button class="btn btn-warning">
                10:00
              </button>

              <button class="btn btn-success">
                11:00
              </button>

              <button class="btn btn-success">
                12:00
              </button>

              <button class="btn btn-success">
                13:00
              </button>

            </div>

            <div class="mt-4">
              <p class="mb-1">
                <span class="badge bg-success">Verde</span> Hora disponible
              </p>
              <p class="mb-1">
                <span class="badge bg-warning text-dark">Amarillo</span> Hora seleccionada
              </p>
              <p class="mb-0">
                <span class="badge bg-secondary">Gris</span> Hora no disponible
              </p>
            </div>

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