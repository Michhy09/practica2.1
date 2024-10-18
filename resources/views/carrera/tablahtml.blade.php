<h1>Carreras</h1>
<hr>

<!-- Botón agregar -->
<a href="{{ route('carrera.create') }}" class="btn btn-outline-dark mb-3">Agregar Carrera</a>
<hr>

@if(session('mensaje'))
    <p>{{ session('mensaje') }}</p>
@endif

<!-- Tabla de alumnos -->
<div class="table-responsive-md">
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID Carrera</th>
                <th scope="col">Nombre Carrera</th>
                <th scope="col">Nombre mediano</th>
                <th scope="col">Nombre corto</th>
               
                <th scope="col">ID Depto</th>
                <th scope="col" colspan="3" class="text-center"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carreras as $carrera)
            <tr>
                <td scope="row">{{ $carrera->noctrl }}</td>
                <td>{{ $carrera->nombre }}</td>
                <td>{{ $carrera->nombremediano }}</td>
                <td>{{ $carrera->nombrecorto }}</td>
               
                <td>{{ $carrera->iddepto }}</td>
                <td><a href="{{route('carrera.editar',  $carrera->id)}}" class="btn btn-outline-dark btn-sm">Editar</a></td>
                <td><a href="{{route('carrera.destroy', $carrera->id)}}" class="btn btn-outline-dark btn-sm">Eliminar</a></td>
                <td><a href="{{route('carrera.ver', $carrera->id)}}" class="btn btn-outline-dark btn-sm">Ver</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$carreras->links()}}
</div>

  
