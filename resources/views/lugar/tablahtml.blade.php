<h1>Lugares</h1>
<hr>

<!-- Botón agregar -->
<a href="{{ route('lugar.create') }}" class="btn btn-outline-dark mb-3">Agregar Lugar</a>
<hr>

@if(session('mensaje'))
    <p>{{ session('mensaje') }}</p>
@endif

<!-- Tabla de lugar -->
<table class="table table-striped table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre Lugar</th>
            <th scope="col">Nombre Corto</th>
            <th scope="col">Edificio</th>
            <th scope="col" colspan="3" class="text-center"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lugares as $lugar)
        <tr>
            <td scope="row">{{ $lugar->id }}</td>
            <td>{{ $lugar->nombrelugar }}</td>
            <td>{{ $lugar->nombrecorto }}</td>
            <td>{{ $lugar->edificio->nombreedificio ?? 'Sin edificio' }}</td> <!-- Muestra el nombre del edificio relacionado -->

            <!-- Botones de acción -->
            <td>
                <a href="{{ route('lugar.editar', $lugar->id) }}" class="btn btn-outline-dark btn-sm">Editar</a>
            </td>

            <td>
                <a href="{{ route('lugar.destroy', $lugar->id) }}" 
                   class="btn btn-outline-dark btn-sm" 
                   onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar este registro?')) { document.getElementById('delete-form-{{ $lugar->id }}').submit(); }">
                    Eliminar
                </a>
                <!-- Formulario oculto para la solicitud DELETE -->
                <form id="delete-form-{{ $lugar->id }}" action="{{ route('lugar.destroy', $lugar->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </td>

            <td>
                <a href="{{ route('lugar.ver', $lugar->id) }}" class="btn btn-outline-dark btn-sm">Ver</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $lugares->links() }}
