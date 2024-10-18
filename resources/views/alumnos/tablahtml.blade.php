<h1>Alumnos</h1>
<hr>
<!-- Botón agregar -->
<a href="{{ route('alumnos.create') }}" class="btn btn-outline-dark mb-3">Agregar Alumno</a>
<hr>

@if(session('mensaje'))
    <p>{{ session('mensaje') }}</p>
@endif
@csrf
<!-- Tabla de alumnos -->
<div class="table-responsive-md">
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th scope="col">No. Control</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Apellido Materno</th>
                <th scope="col">Sexo</th>
                <th scope="col">ID Carrera</th>
                <th scope="col" colspan="3" class="text-center"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->id }}</td>
                <td>{{ $alumno->noctrl }}</td>
                <td>{{ $alumno->nombre }}</td>
                <td>{{ $alumno->apellidop }}</td>
                <td>{{ $alumno->apellidom }}</td>
                <td>{{ $alumno->sexo }}</td>
                <td>{{ $alumno->carrera }}</td>
                <td><a href="{{ route('alumnos.editar',  $alumno->id) }}" class="btn btn-outline-dark btn-sm">Editar</a></td>
                <td><a href="{{ route('alumnos.destroy', $alumno->id) }}" class="btn btn-outline-dark btn-sm">Eliminar</a></td>
                <td><a href="{{ route('alumnos.ver', $alumno->id) }}" class="btn btn-outline-dark btn-sm">Ver</a></td>
            </tr>
        @endforeach
        
        </tbody>
    </table>

    {{ $alumnos->links() }}
</div>
