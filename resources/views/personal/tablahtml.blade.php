<h1>Personal</h1>
<hr>

<!-- Botón agregar -->
<a href="{{ route('personal.create') }}" class="btn btn-outline-dark mb-3">Agregar Personal</a>
<hr>

@if(session('mensaje'))
    <p>{{ session('mensaje') }}</p>
@endif


<!-- Tabla de personal -->
<table class="table table-striped table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">RFC</th>
            <th scope="col">Licenciatura</th>
            <th scope="col">Departamento</th>
            <th scope="col">Puesto</th>
            <th scope="col" colspan="3" class="text-center"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($personal as $persona)

    <tr>
        <td scope="row">{{ $persona->id }}</td>
        <td>{{ $persona->nombres }} {{ $persona->apellidop }} {{ $persona->apellidom }}</td>
        <td>{{ $persona->RFC }}</td>
        <td>{{ $persona->licenciatura }}</td>
        <td>{{ $persona->depto->nombredepto }}</td>
        <td>{{ $persona->puesto->nombre }}</td>

        <!-- Botones de acción -->
        <td>
            <a href="{{ route('personal.editar', $persona->id) }}" class="btn btn-outline-dark btn-sm">Editar</a>
        </td>

        <td>
            <a href="{{ route('personal.destroy', $persona->id) }}" 
               class="btn btn-outline-dark btn-sm" 
               onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar este registro?')) { document.getElementById('delete-form-{{ $persona->id }}').submit(); }">
                Eliminar
            </a>
            <!-- Formulario oculto para la solicitud DELETE -->
            <form id="delete-form-{{ $persona->id }}" action="{{ route('personal.destroy', $persona->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </td>

        <td>
            <a href="{{ route('personal.ver', $persona->id) }}" class="btn btn-outline-dark btn-sm">Ver</a>
        </td>
    </tr>
@endforeach

    </tbody>
</table>

    
    {{ $personal->links() }}
</div>
