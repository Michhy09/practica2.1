<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    @vite(["resources/sass/app.scss", "resources/js/app.js"])
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            text-align: center;
        }

        header, footer {
            width: 100%;
            background-color: black;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .container {
            flex: 1;
            display: flex;
            text-align: center;
            justify-content: center;
            padding: 20px;
            max-width: 100%; /* Ajusta el ancho máximo del contenedor */
            margin: 0 auto; /* Centra el contenedor */
        }

        .sidebar {
            width: 25%; /* Ancho de la barra lateral aumentado */
            background-color: black;
            color: white;
            padding: 10px;
            border-radius: 5px;
            position: sticky;
            text-align: center;
            height: 100vh;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }

        .sidebar ul li a:hover {
            color: #ffdd57;
        }

        .main-content {
            text-align: center;
            justify-content: center;
            flex: 1;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            max-width: 75%; /* Ajusta el ancho máximo del contenido principal */
            text-align: left; /* Alineación a la izquierda */
        }

        footer {
            background-color: black;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: auto;
        }

        footer a {
            color: #ffdd57;
            text-decoration: none;
            margin: 0 10px;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .pagination {
            font-size: 14px;
        }

        .pagination .page-link {
            padding: 8px 16px;
            font-size: 14px;
        }

    </style>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark ">
        <a class="navbar-brand" href="#">WebApp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                <li class="nav-item"><a class="nav-link" href="#acerca">Acerca de</a></li>
                <li class="nav-item"><a class="nav-link" href="#contacto">Contáctanos</a></li>
                <li class="nav-item"><a class="nav-link" href="#ayuda">Ayuda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrar Usuario</a></li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Horarios
                    </a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <a class="dropdown-item" href="#">Docentes</a>
                            <a class="dropdown-item" href="">Alumnos</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Proyectos Individuales
                    </a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <a class="dropdown-item" href="#">Capacitación</a>
                            <a class="dropdown-item" href="#">Asesorías Doc.</a>
                            <a class="dropdown-item" href="#">Proyectos</a>
                            <a class="dropdown-item" href="#">Material Didáctico</a>
                            <a class="dropdown-item" href="#">Docencia e Inv.</a>
                            <a class="dropdown-item" href="#">Asesoría Proyectos Ext.</a>
                            <a class="dropdown-item" href="#">Asesoría a S.S.</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#instrumentacion">Instrumentación</a></li>
                <li class="nav-item"><a class="nav-link" href="#tutorias">Tutorías</a></li>
                <li class="nav-item">
                    <select id="periodo" name="periodo" class="form-control">
                        <option value="ene-jun-24">Ene-Jun 24</option>
                        <option value="ago-dic-24">Ago-Dic 24</option>
                        <option value="ene-jun-25">Ene-Jun 25</option>
                    </select>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link">Logout</button>
                    </form>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>
@auth
<div class="container mt-4">
    <div class="sidebar">
        <h2>Catálogos</h2>
        <ul>
            <li><a class="nav-link" href="{{ route('periodos.index') }}">Periodos</a></li>
            <li><a class="nav-link" href="{{ route('plazas.index') }}">Plazas</a></li>
            <li><a class="nav-link" href="{{ route('puestos.index') }}">Puestos</a></li>
            <li><a class="nav-link" href="{{ route('personal.index') }}">Personal</a></li>
            <li><a class="nav-link" href="{{ route('depto.index') }}">Deptos.</a></li>
            <li><a class="nav-link" href="{{ route('carrera.index') }}">Carreras</a></li>
            <li><a class="nav-link" href="{{ route('reticulas.index') }}">Retículas</a></li>
            <li><a class="nav-link" href="{{ route('materias.index') }}">Materias</a></li>
            <li><a class="nav-link" href="{{ route('alumnos.index') }}">Alumnos</a></li>
            <li><a class="nav-link" href="{{ route('personaPla.index') }}">Personal-Plaza</a></li>
            <li><a class="nav-link" href="{{ route('edificio.index') }}">Edificio</a></li>
            <li><a class="nav-link" href="{{ route('lugar.index') }}">Lugar</a></li>
            <li><a class="nav-link" href="{{ route('hora.index') }}">Hora</a></li>
            <li><a class="nav-link" href="{{ route('matabi.index') }}">Materia Abierta</a></li>
            <li><a class="nav-link" href="{{ route('asmateria.index') }}">Asignacion de materias</a></li>
        </ul>
    </div>
    @endauth
    <div class="main-content">
        @guest
        <h1>Bienvenido a la WebApp</h1>
        <p>Bienvenidos a mi WebApp.</p>
        @endguest
        @auth
        <div class="main-content">
            @yield('contenido1')
            @yield('contenido2')
        </div>
        @endauth
    </div>
</div>

<footer>
    @guest
    <p>Tecnologías utilizadas en este proyecto:</p>
    <div class="footer-links">
        <a href="https://getcomposer.org/" target="_blank">Composer</a>
        <a href="https://nodejs.org/" target="_blank">Node.js</a>
        <a href="https://www.npmjs.com/" target="_blank">NPM</a>
        <a href="https://laravel.com/docs/eloquent" target="_blank">Eloquent</a>
        <a href="https://laravel.com/docs/migrations" target="_blank">Migrations</a>
        <a href="https://laravel.com/docs/blade" target="_blank">Blade</a>
        <a href="https://laravel.com/docs/middleware" target="_blank">Middleware</a>
        <a href="https://laravel.com/docs" target="_blank">Laravel</a>
        <a href="https://getbootstrap.com/docs/5.3/getting-started/introduction/" target="_blank">Bootstrap</a>
    </div>
    @endguest
    @auth
    <p>Usuario: {{ Auth::user()->name }}</p>
    <p>Email: {{ Auth::user()->email }}</p>
    @endauth
</footer>

</body>
</html>



