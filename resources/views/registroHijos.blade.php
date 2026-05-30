<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar niños</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container">
    <div class="row justify-content-center align-items-center min-vh-100 py-4">
      <div class="col-md-5">

        <div class="card shadow">
          <div class="card-body p-4">

            <h3 class="text-center mb-3">Registro</h3>

            <p class="text-center text-muted mb-4">
              Registra los datos del menor.
            </p>

            <form>
              <div class="mb-3">
                <label for="nombreHijo" class="form-label">Nombre del hijo</label>
                <input 
                  type="text" 
                  class="form-control" 
                  id="nombreHijo" 
                  placeholder="Ingresa el nombre"
                  required
                >
              </div>

              <div class="mb-3">
                <label for="apPat" class="form-label">Apellido paterno</label>
                <input 
                  type="text" 
                  class="form-control" 
                  id="paterno" 
                  placeholder="Ingresa el apellido paterno"
                  required
                >
              </div>

              <div class="mb-3">
                <label for="apMat" class="form-label">Apellido materno</label>
                <input 
                  type="text" 
                  class="form-control" 
                  id="materno" 
                  placeholder="Ingresa el apellido materno"
                  required
                >
              </div>

              <div class="mb-3">
                <label for="fechaNacimiento" class="form-label">Fecha de nacimiento</label>
                <input 
                  type="date" 
                  class="form-control" 
                  id="fechaNacimiento"
                  required
                >
              </div>

              <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select class="form-select" id="sexo" required>
                  <option value="">Selecciona una opción</option>
                  <option value="Femenino">Femenino</option>
                  <option value="Masculino">Masculino</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="alergias" class="form-label">Alergias</label>
                <select class="form-select" id="alergias" required>
                  <option value="">Selecciona una opción</option>
                  <option value="Ninguna">Ninguna</option>
                  <option value="Polvo">Polvo</option>
                  <option value="Polen">Polen</option>
                  <option value="Medicamentos">Medicamentos</option>
                  <option value="Alimentos">Alimentos</option>
                  <option value="Lácteos">Lácteos</option>
                  <option value="Huevo">Huevo</option>
                  <option value="Mariscos">Mariscos</option>
                  <option value="Picaduras de insectos">Picaduras de insectos</option>
                  <option value="Mascotas">Mascotas</option>
                  <option value="Otra">Otra</option>
                </select>
              </div>

              <button type="submit" class="btn btn-success w-100">
                Registrar hijo
              </button>
            </form>

            <p class="text-center mt-3 mb-0">
              <a >Volver al inicio</a>
            </p>

          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>