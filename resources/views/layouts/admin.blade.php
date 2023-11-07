<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Quesitas Editorial</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="<?= url('img/logo/quesitas-favicon.ico') ?>">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbarAdmin">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                    aria-controls="navbar" aria-expanded="false" aria-label="Abrir/cerrar menu de navegacion">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-collapseAdmin" id="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('admin.index') }}" class="nav-link">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">Libros</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboardNews') }}" class="nav-link">Novedades</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.usuarios.listaUsuarios') }}" class="nav-link">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">Volver al sitio</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('auth.logout') }}" method="post">
                                @csrf
                                <button class="btn" type="submit">{{ auth()->user()->email }} - Cerrar
                                    Sesión</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <main class="mainAdmin">
            @if (Session::has('message.success'))
                <div class="alert alert-success">{!! Session::get('message.success') !!}</div>
            @endif
            @yield('main')
        </main>

        <footer class="footerMain">
            <p>Da Vinci &copy; 2023</p>
        </footer>
    </div>

    <script src="{{ url('js/bootstrap.bundle.js') }}"></script>
</body>

</html>
