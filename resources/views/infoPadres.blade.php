<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Perfil</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container py-5">

    <div class="row justify-content-center">
      <div class="col-md-7 col-lg-6">

        <div class="card shadow mb-4">
          <div class="card-body p-4">

            <div class="d-flex align-items-center justify-content-center mb-4">
              <h2 class="me-4 mb-0">Mi perfil</h2>

            </div>

            <form>
              <div class="mb-3">
                <label for="nombre" class="form-label fw-bold">Nombre completo</label>
                <input 
                  type="text" 
                  class="form-control" 
                  id="nombre" 
                  value="Maria González"
                  readonly
                >
              </div>

              <div class="mb-3">
                <label for="correo" class="form-label fw-bold">Correo electrónico</label>
                <input 
                  type="email" 
                  class="form-control" 
                  id="correo" 
                  value="maria.lopez@gmail.com"
                >
              </div>

              <div class="mb-3">
                <label for="telefono" class="form-label fw-bold">Teléfono</label>
                <input 
                  type="tel" 
                  class="form-control" 
                  id="telefono" 
                  value="715 112 5696"
                >
              </div>

              <div class="text-center mt-4">
                <button type="submit" class="btn btn-success px-4">
                  Guardar cambios
                </button>

              </div>
            </form>

          </div>
        </div>

        <h4 class="text-center mb-3">Hijos </h4>

        <div class="card shadow mb-3">
          <div class="card-body">

            <h5 class="card-title mb-3">Maritza Hernández González</h5>

            <p class="mb-1">
              <strong>Edad:</strong> 3 años
            </p>

            <p class="mb-1">
              <strong>Sexo:</strong> Femenino
            </p>

            <p class="mb-0">
              <strong>Alergias:</strong> Lácteos
            </p>

          </div>
        </div>

        <div class="text-center mt-4">
          <a href="registroHijos.html" class="btn btn-success">
            Registrar otro hijo
          </a>
        </div>

      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

