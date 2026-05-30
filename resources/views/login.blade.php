<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de Sesión</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container">
    <div class="row justify-content-center align-items-center vh-100">
      <div class="col-md-4">

        <div class="card shadow">
          <div class="card-body p-4">

            <h3 class="text-center mb-4">Iniciar Sesión</h3>

            <form method="POST" action="{{route('login')}}">
              @csrf
              <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input 
                  type="email" 
                  class="form-control" 
                  id="correo" 
                  placeholder="Ingresa tu correo"
                  required
                  name="email"
                >
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input 
                  type="password" 
                  class="form-control" 
                  id="password" 
                  placeholder="Ingresa tu contraseña"
                  required
                  name="password"
                >
              </div>

              <button type="submit" class="btn btn-primary w-100">
                Entrar
              </button>
            </form>
          <p class="text-center mt-3 mb-0">
              No tienes cuenta?
              <a href="{{ route('register') }}">Regístrate</a>
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>