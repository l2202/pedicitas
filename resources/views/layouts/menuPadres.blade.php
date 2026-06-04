<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Padre</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #0d6efd;
            padding-top: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            font-size: 1.2rem;
        }

        .sidebar a:hover {
            background-color: #0b5ed7;
        }

        .sidebar-title {
            color: white;
        }

        .usuario-menu {
            color: white;
            padding: 15px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            margin-bottom: 15px;
        }

        .usuario-menu i {
            font-size: 2rem;
            margin-right: 10px;
        }

        .btn-salir {
            color: white;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            padding: 10px 20px;
            font-size: 1.2rem;
        }

        .btn-salir:hover {
            background-color: #0b5ed7;
        }

        @media (max-width: 767px) {
            .desktop-sidebar {
                display: none;
            }
        }

        @media (min-width: 768px) {
            .mobile-navbar {
                display: none;
            }
        }
    </style>

    @laravelPWA
</head>

<body>


    <nav class="navbar navbar-dark mobile-navbar" style="background-color: #0d6efd;">
        <div class="container-fluid">
            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#mobileMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <span class="navbar-brand mb-0 h1">
                Menú
            </span>
        </div>
    </nav>

    <!-- Menú celular -->
    <div class="offcanvas offcanvas-start text-bg-dark"
        tabindex="-1"
        id="mobileMenu">

        <div class="offcanvas-header" style="background-color: #0d6efd;">
            <h5 class="offcanvas-title">Menú</h5>

            <button type="button"
                class="btn-close btn-close-white"
                data-bs-dismiss="offcanvas">
            </button>
        </div>

        <div class="offcanvas-body p-0">
            <div class="sidebar">

                <div class="usuario-menu d-flex align-items-center">
                    <i class="bi bi-person-circle"></i>
                    <div>
                        <strong>{{ Auth::user()->nombre }}</strong>
                        <br>
                        <small>Padre </small>
                    </div>
                </div>

                <a href="{{ route('infoPadres') }}">
                    <i class="bi bi-person me-2"></i> Ver perfil
                </a>

                <a href="{{ route('registroHijos') }}">
                    <i class="bi bi-person-plus me-2"></i> Registrar hijo
                </a>

                <a href="{{ route('agendarCita') }}">
                    <i class="bi bi-calendar-check me-2"></i> Agendar cita
                </a>

                <a href="{{ route('padreCitas') }}">
                    <i class="bi bi-calendar-week me-2"></i> Mis citas
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-salir">
                        <i class="bi bi-box-arrow-right me-2"></i> Salir
                    </button>
                </form>

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">

            <nav class="col-md-3 col-lg-2 sidebar desktop-sidebar">
                <h3 class="sidebar-title px-3">Menú</h3>
                <hr class="text-white">

                <div class="usuario-menu d-flex align-items-center">
                    <i class="bi bi-person-circle"></i>
                    <div>
                        <strong>{{ Auth::user()->nombre }}</strong>
                        <br>
                        <small>Padre</small>
                    </div>
                </div>

                <a href="{{ route('infoPadres') }}">
                    <i class="bi bi-person me-2"></i> Ver perfil
                </a>

                <a href="{{ route('registroHijos') }}">
                    <i class="bi bi-person-plus me-2"></i> Registrar hijo
                </a>

                <a href="{{ route('agendarCita') }}">
                    <i class="bi bi-calendar-check me-2"></i> Agendar cita
                </a>

                <a href="{{ route('padreCitas') }}">
                    <i class="bi bi-calendar-week me-2"></i> Mis citas
                </a>


                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-salir">
                        <i class="bi bi-box-arrow-right me-2"></i> Salir
                    </button>
                </form>
            </nav>

            <main class="col-12 col-md-9 col-lg-10 p-4">
                @yield('content')
            </main>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>