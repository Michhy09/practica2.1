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
            background-color: #f4f4f4; /* Color de fondo general */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header, footer {
            width: 100%;
            background-color: black; /* Color del encabezado y pie de página */
            color: white;
            padding: 10px;
            text-align: center;
        }
        nav {
            background-color: black; /* Color del menú */
        }
        .container {
            flex: 1;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }
        .sidebar {
            width: 20%;
            background-color: black; /* Color de la barra lateral */
            color: white;
            padding: 10px;
            border-radius: 5px;
        }
        .sidebar h2 {
            text-align: center;
        }
        .main-content {
            flex: 1;
            padding: 20px;
            background-color: white; /* Color del contenido principal */
            border-radius: 5px;
            max-width: 80%;
            text-align: center;
        }
        footer a {
            color: #ffdd57; /* Color de los enlaces del pie de página */
            text-decoration: none;
            margin: 0 10px;
        }
        .footer-links {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .dropdown-menu .nav-item {
            margin: 0 10px; /* Espaciado horizontal entre los elementos */
        }
        .dropdown-menu .nav-link {
            color: #0d0d0e; /* Color de la letra en las opciones del menú desplegable */
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
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Registrar Usuario</a>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Catálogos
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link" href="#periodos">Periodos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('plazas.index') }}">Plazas</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('puestos.index') }}">Puestos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#personal">Personal</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('depto.index') }}">Deptos.</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('carrera.index') }}">Carreras</a></li>
                        <li class="nav-item"><a class="nav-link" href="#reticulas">Retículas</a></li>
                        <li class="nav-item"><a class="nav-link" href="#materias">Materias</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('alumnos.index') }}">Alumnos</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Horarios
                    </a>
                    <ul class="dropdown-menu">
                        <li class="d-flex justify-content-around">
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
                        <li class="d-flex justify-content-around">
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

<div class="container mt-4">

    <div class="main-content">
        @guest
        <h1>Bienvenido a la WebApp</h1>
        <p>Bienvenidos a mi WebApp.</p>
        @endguest
        @auth
        <div class="main-content">
            @yield('contenido1')
            @yield('contenido2') <!-- Aquí se mostrará el contenido de la sección 'contenido1' -->
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
        <a href="https://laravel.com/docs/blade" target="_blank">Blade</a>
    </div>
    @endguest
    @auth
    <p>Usuario: {{ Auth::user()->name }}</p>
    <p>Email: {{ Auth::user()->email }}</p>
    @endauth
</footer>

</body>
</html>




