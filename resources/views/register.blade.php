<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container">
    <div class="row justify-content-center align-items-center vh-100">
      <div class="col-md-5">

        <div class="card shadow">
          <div class="card-body p-4">

            <h3 class="text-center mb-4">Registrar</h3>

            <form method="POST" action="{{route('validar-registro')}}">
              @csrf
              <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input 
                  type="email" 
                  class="form-control" 
                  id="correo" 
                  placeholder="Ingresa el correo"
                  name="email"
                  required
                >
              </div>

              <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input 
                  type="password" 
                  class="form-control" 
                  id="contrasena" 
                  placeholder="Ingresa la contraseña"
                  name="password"
                  required
                >
              </div>
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input 
                  type="text" 
                  class="form-control" 
                  id="nombre" 
                  placeholder="Ingresa el nombre "
                  name="name"
                  required
                >
              </div>

              <div class="mb-3">
                <label for="apPat" class="form-label">Apellido paterno: </label>
                <input 
                  type="text" 
                  class="form-control" 
                  id="paterno" 
                  placeholder="Ingresa el apellido paterno "
                  required
                >
              </div>
              <div class="mb-3">
                <label for="apMat" class="form-label">Apellido materno: </label>
                  <input 
                    type="text" 
                    class="form-control" 
                    id="materno" 
                    placeholder="Ingresa el apellido materno "
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
                <label for="telefono" class="form-label">Teléfono</label>
                <input 
                  type="tel" 
                  class="form-control" 
                  id="telefono" 
                  placeholder="Ejemplo: 1234567890"
                  pattern="[0-9]{10}"
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

              <button type="submit" class="btn btn-success w-100">
                Registrar
              </button>
            </form>

            <p class="text-center mt-3 mb-0">
              ¿Ya tienes cuenta?
              <a href="{{ route('login') }}">Inicia sesión</a>
            </p>

          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>