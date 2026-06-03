@extends('layouts.menuPadres')
@section('content')
<div class="container py-5">

  <div class="row justify-content-center">
    <div class="col-md-7 col-lg-6">

      <div class="card shadow mb-4">
        <div class="card-body p-4">

          <div class="d-flex align-items-center justify-content-center mb-4">
            <h2 class="me-4 mb-0">Mi perfil</h2>
          </div>

          <form method="POST" action="{{ route('modificarPadre') }}">
            @csrf

            <div class="mb-3">
              <label for="nombre" class="form-label fw-bold">Nombre completo</label>
              <input
                type="text"
                class="form-control"
                id="nombre"
                value="{{ $padre->nombre }} {{ $padre->appa }} {{ $padre->apma }}"
                readonly>
            </div>

            <div class="mb-3">
              <label for="correo" class="form-label fw-bold">Correo electrónico</label>
              <input
                type="email"
                class="form-control"
                id="correo"
                name="email"
                value="{{ $padre->email }}"
                required>
            </div>

            <div class="mb-3">
              <label for="telefono" class="form-label fw-bold">Teléfono</label>
              <input
                type="tel"
                class="form-control"
                id="telefono"
                name="telefono"
                value="{{ $padre->telefono }}"
                required>
            </div>

            <div class="text-center mt-4">
              <button type="submit" class="btn btn-success px-4">
                Guardar cambios
              </button>
            </div>

          </form>

        </div>
      </div>

      <h4 class="text-center mb-3">Hijos</h4>

      @if($hijos->isEmpty())
      <div class="alert alert-info">
        No has registrado ningún hijo.
      </div>
      @else
      @foreach($hijos as $hijo)
      <div class="card shadow mb-3">
        <div class="card-body">

          <h5 class="card-title mb-3">
            {{ $hijo->nombre }} {{ $hijo->appa }} {{ $hijo->apma }}
          </h5>

          <p class="mb-1">
            <strong>Edad:</strong> {{ \Carbon\Carbon::parse($hijo->fecha_nacimiento)->age }} años
          </p>

          <p class="mb-1">
            <strong>Sexo:</strong> {{ $hijo->sexo }}
          </p>

          <p class="mb-0">
            <strong>Alergias:</strong> {{ $hijo->alergias }}
          </p>

        </div>
      </div>
      @endforeach
      @endif

      <div class="text-center mt-4">
        <a href="{{ route('registroHijos') }}" class="btn btn-success">
          Registrar otro hijo
        </a>
      </div>

    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection