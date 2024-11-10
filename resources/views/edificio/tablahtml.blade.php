<h1>Edificio</h1>
<hr>

<!-- Botón agregar -->
<a href="{{ route('edificio.create') }}" class="btn btn-outline-dark mb-3">Agregar Edificio</a>
<hr>

@if(session('mensaje'))
    <p>{{ session('mensaje') }}</p>
@endif

<!-- Tabla de edificio -->
<table class="table table-striped table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre Edificio</th>
            <th scope="col">Nombre Corto</th>
            <th scope="col" colspan="3" class="text-center"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($edificios as $edificio)
        <tr>
            <td scope="row">{{ $edificio->id }}</td>
            <td>{{ $edificio->nombreedificio }}</td>
            <td>{{ $edificio->nombrecorto }}</td>

            <!-- Botones de acción -->
            <td>
                <a href="{{ route('edificio.editar', $edificio->id) }}" class="btn btn-outline-dark btn-sm">Editar</a>
            </td>

            <td>
                <a href="{{ route('edificio.destroy', $edificio->id) }}" 
                   class="btn btn-outline-dark btn-sm" 
                   onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar este registro?')) { document.getElementById('delete-form-{{ $edificio->id }}').submit(); }">
                    Eliminar
                </a>
                <!-- Formulario oculto para la solicitud DELETE -->
                <form id="delete-form-{{ $edificio->id }}" action="{{ route('edificio.destroy', $edificio->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </td>

            <td>
                <a href="{{ route('edificio.ver', $edificio->id) }}" class="btn btn-outline-dark btn-sm">Ver</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $edificios->links() }}
  