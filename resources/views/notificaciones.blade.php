<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar notificaciones</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container py-5">

    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">

        <div class="card shadow">
          <div class="card-body p-4">

            <h2 class="text-center mb-4">Agregar notificación</h2>

            <form>

              <div class="mb-3">
                <label class="form-label d-block">Para</label>

                <div class="form-check form-check-inline">
                  <input 
                    class="form-check-input" 
                    type="radio" 
                    name="para" 
                    id="ninos" 
                    value="Niños"
                  >
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
                    value="Niñas"
                  >
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
                    checked
                  >
                  <label class="form-check-label" for="todos">
                    Todos
                  </label>
                </div>
              </div>

              <div class="mb-3">
                <label for="edad" class="form-label">A la edad de</label>
                <select class="form-select" id="edad" required>
                  <option value="">Selecciona la edad</option>
                  <option value="1 mes">1 mes</option>
                  <option value="2 meses">2 meses</option>
                  <option value="3 meses">3 meses</option>
                  <option value="4 meses">4 meses</option>
                  <option value="6 meses">6 meses</option>
                  <option value="9 meses">9 meses</option>
                  <option value="1 año">1 año</option>
                  <option value="2 años">2 años</option>
                  <option value="3 años">3 años</option>
                  <option value="4 años">4 años</option>
                  <option value="5 años">5 años</option>
                </select>
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
                  placeholder="Escribe aquí el mensaje de la notificación"
                ></textarea>
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