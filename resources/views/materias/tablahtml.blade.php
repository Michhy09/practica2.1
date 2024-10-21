<h1>Materias</h1>
<hr>

<!-- Botón agregar -->
<a href="{{ route('materias.create') }}" class="btn btn-outline-dark mb-3">Agregar Materia</a>
<hr>

@if(session('mensaje'))
    <p>{{ session('mensaje') }}</p>
@endif

<!-- Tabla de alumnos -->
<div class="table-responsive-md">
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID Materia</th>
                <th scope="col">Nombre </th>
                <th scope="col">Nivel</th>
                <th scope="col">Nombre mediano</th>
                <th scope="col">Nombre corto</th>
                <th scope="col">Modalidad</th>
                <th scope="col">Reticula</th>
                
                <th scope="col" colspan="3" class="text-center"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materias as $materia)
            <tr>
    <td scope="row">{{ $materia->idmateria }}</td>
    <td>{{ $materia->nombre }}</td>
    <td>{{ $materia->nivel }}</td>
    <td>{{ $materia->nombremediano }}</td>
    <td>{{ $materia->nombrecorto }}</td>
    <td>{{ $materia->modalidad }}</td>
   
    <td>{{ $materia->reticula ? $materia->reticula->desc : 'Sin retícula' }}</td> 

                <td><a href="{{route('materias.editar',  $materia->id)}}" class="btn btn-outline-dark btn-sm">Editar</a></td>
                
                <td>
                    <a href="{{ route('materias.destroy', $materia->id) }}" 
                       class="btn btn-outline-dark btn-sm" 
                       onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar esta Materia?')) { document.getElementById('delete-form-{{ $materia->id }}').submit(); }">
                        Eliminar
                    </a>
                
                    <!-- Formulario oculto para enviar la petición DELETE -->
                    <form id="delete-form-{{ $materia->id }}" action="{{ route('materias.destroy', $materia->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>


                <td><a href="{{route('materias.ver', $materia->id)}}" class="btn btn-outline-dark btn-sm">Ver</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$materias->links()}}
</div>

  
