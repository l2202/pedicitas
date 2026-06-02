<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Padre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #5d0f10;
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
            background-color: #8c1b1c;
        }

        .sidebar-title {
            color: white;
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

    <!-- Navbar movil -->
    <nav class="navbar navbar-dark mobile-navbar" style="background-color: #5d0f10;">
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

    <!-- Menu movil -->
    <div class="offcanvas offcanvas-start text-bg-dark"
        tabindex="-1"
        id="mobileMenu">

        <div class="offcanvas-header">
            <button type="button"
                class="btn-close btn-close-white"
                data-bs-dismiss="offcanvas">
            </button>
        </div>

        <div class="offcanvas-body p-0">
            <div class="sidebar">
                <a href="{{ route('infoPadres') }}">Ver perfil</a>
                <a href="{{ route('registroHijos') }}">Registrar hijo</a>
                <a href="#">Agendar cita</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">

            <nav class="col-md-3 col-lg-2 sidebar desktop-sidebar">
                <h3 class="sidebar-title">Menú</h3>
                <hr class="text-white">

                <a href="{{ route('infoPadres') }}">Ver perfil</a>
                <a href="{{ route('registroHijos') }}">Registrar hijo</a>
                <a href="#">Agendar cita</a>
            </nav>

            <main class="col-12 col-md-9 col-lg-10 p-4">
                @yield('content')
            </main>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>