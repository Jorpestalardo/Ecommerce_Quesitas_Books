<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Quesitas Editorial</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="<?= url('img/logo/quesitas-favicon.ico') ?>">

    <link rel="stylesheet" href="<?= url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= url('css/app.css') ?>">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                    aria-controls="navbar" aria-expanded="false" aria-label="Abrir/cerrar menu de navegacion">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('nosotros') }}">Quienes somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('news.index') }}">Novedades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('libros.index') }}">Nuestros libros</a>
                        </li>
                        @auth()
                            @if (auth()->user()->roles_id != 1)
                                <li class="nav-item">
                                    <a class="nav-link profile" href=" {{ route('usuario.perfil') }}">
                                        <ion-icon name="person-outline"></ion-icon>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('cart.index') }}">
                                        <ion-icon name="bag-outline"></ion-icon>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <form action="{{ route('auth.logout') }}" method="post">
                                        @csrf
                                        <button class="nav-link" type="submit">{{ auth()->user()->email }} - Cerrar Sesión
                                        </button>
                                    </form>
                                </li>
                            @elseif(auth()->user()->roles_id == 1)
                                <li class="nav-item">
                                    <a href="{{ route('admin.index') }}" class="nav-link">Volver al dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <form action="{{ route('auth.logout') }}" method="post">
                                        @csrf
                                        <button class="nav-link" type="submit">{{ auth()->user()->email }} - Cerrar Sesión
                                        </button>
                                    </form>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href=" {{ route('auth.login') }}">Iniciar Sesión</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href=" {{ route('auth.register') }}">Registrarse</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            @if (Session::has('message.success'))
                <div class="alert alert-success">{!! Session::get('message.success') !!}</div>
            @endif

            @yield('main')
        </main>
        <footer class="footer">
            <p>Da Vinci &copy; 2023</p>
        </footer>
    </div>

    <script src="{{ url('js/bootstrap.bundle.js') }}"></script>
</body>

</html>
