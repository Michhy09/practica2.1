<br>
<h1>Materias</h1>
<hr>

<!-- Botón agregar -->
<a href="{{route('materias.create')}}" class="btn btn-outline-dark mb-3">Agregar Materia</a>
<hr>

<!-- Tabla de materias -->
<div class="table-responsive-md">
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th></th>
                <th scope="col">ID Materia</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nivel</th>
                <th scope="col">Nombre Mediano</th>
                <th scope="col">Nombre Corto</th>
                <th scope="col">Modalidad</th>
                <th scope="col">Retícula</th>
                <th scope="col" colspan="3" class="text-center"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materias as $materia)
            <tr>
                <td scope="row">{{ $materia->id }}</td>
                <td>{{ $materia->idmateria }}</td>
                <td>{{ $materia->nombre }}</td>
                <td>{{ $materia->nivel }}</td>
                <td>{{ $materia->nombremediano }}</td>
                <td>{{ $materia->nombrecorto }}</td>
                <td>{{ $materia->modalidad }}</td>
                <td>{{ $materia->reticula->idreticula }}</td> <!-- Asumiendo que 'nombre' es un campo de la tabla 'reticulas' -->
                
                <!-- Botón Editar -->
                <td><a href="{{ route('materias.editar', $materia->id) }}" class="btn btn-outline-dark btn-sm">Editar</a></td>

                <!-- Botón Eliminar -->
                <td>
                    <a href="{{ route('materias.destroy', $materia->id) }}" 
                        class="btn btn-outline-dark btn-sm" 
                        onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar esta materia?')) { document.getElementById('delete-form-{{ $materia->id }}').submit(); }">
                        Eliminar
                    </a>

                    <!-- Formulario oculto para enviar la petición DELETE -->
                    <form id="delete-form-{{ $materia->id }}" action="{{ route('materias.destroy', $materia->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>

                <!-- Botón Ver detalles -->
                <td><a href="{{ route('materias.ver', $materia->id) }}" class="btn btn-outline-dark btn-sm">Ver</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$materias->links()}}
</div>
