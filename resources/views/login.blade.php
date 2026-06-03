<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de Sesión</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  @laravelPWA
</head>
<body class="bg-light">

  <div class="container">
    <div class="row justify-content-center align-items-center vh-100">
      <div class="col-md-4">

        <div class="card shadow">
          <div class="card-body p-4">

            <h3 class="text-center mb-4">Iniciar Sesión</h3>

            <form method="POST" action="{{route('logearse')}}">
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

                <div class="input-group">
                  <input 
                    type="password" 
                    class="form-control" 
                    id="password" 
                    name="password" 
                    required
                  >

                  <button 
                    class="btn btn-outline-secondary" 
                    type="button" 
                    id="verPassword"
                  >
                    <i class="bi bi-eye-slash" id="icono"></i>
                  </button>
                </div>
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
  <script>
    
      const campoContrasena = document.getElementById('password');
      const botonVer= document.getElementById('verPassword');
      const iconoContrasena = document.getElementById('icono');

      botonVer.addEventListener('click', function () {
      if (campoContrasena.type === 'password') {
          campoContrasena.type = 'text';
          iconoContrasena.classList.remove('bi-eye');
          iconoContrasena.classList.add('bi-eye-slash');
      } else {
          campoContrasena.type = 'password';
          iconoContrasena.classList.remove('bi-eye-slash');
          iconoContrasena.classList.add('bi-eye');
      }
      });

  </script>

</body>
</html>