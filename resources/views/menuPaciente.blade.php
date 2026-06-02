<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú Paciente</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  @laravelPWA
</head>

<body class="bg-light">

  <div class="container py-5">

    <h2 class="text-center mb-4">Menú del paciente</h2>

    <div class="row g-4 justify-content-center">

      <div class="col-md-4">
        <div class="card shadow text-center h-100">
          <div class="card-body">
            <h5 class="card-title">Mi perfil</h5>
            <p class="card-text">Consulta tu información y los datos de tus hijos.</p>
            <a href="{{ route('infoPadres') }}" class="btn btn-success">
              Ver perfil
            </a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card shadow text-center h-100">
          <div class="card-body">
            <h5 class="card-title">Registrar hijo</h5>
            <p class="card-text">Agrega la información de tus hijos.</p>
            <a href="{{ route('registroHijos') }}" class="btn btn-success">
              Registrar hijo
            </a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card shadow text-center h-100">
          <div class="card-body">
            <h5 class="card-title">Agendar cita</h5>
            <p class="card-text">Selecciona fecha y horario disponible.</p>
            <a  class="btn btn-success">
              Agendar cita
            </a>
          </div>
        </div>
      </div>

    </div>

    <div class="text-center mt-4">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">
          Cerrar sesión
        </button>
      </form>
    </div>

  </div>

</body>
</html>