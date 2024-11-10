<h1>Personal-Plazas</h1>
<hr>

<!-- Botón agregar -->
<a href="{{ route('personaPla.create') }}" class="btn btn-outline-dark mb-3">Agregar</a>
<hr>

@if(session('mensaje'))
    <p>{{ session('mensaje') }}</p>
@endif


<table class="table table-striped table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre del Personal</th>
            <th scope="col">Plaza</th>
            <th scope="col">Tipo de Nombramiento</th>
            <th scope="col" colspan="3" class="text-center"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($personalPlazas as $personalPlaza)
        <tr>
            <td scope="row">{{ $personalPlaza->id }}</td>
            <td>{{ $personalPlaza->personal->nombres }} {{ $personalPlaza->personal->apellidop }} {{ $personalPlaza->personal->apellidom }}</td>
            <td>{{ $personalPlaza->plaza->nombrePlaza }}</td>
            <td>
                {{ $personalPlaza->tiponombramiento}}
            </td>
            
            <!-- Botones de acción -->
            <td>
                <a href="{{ route('personaPla.editar', $personalPlaza->id) }}" class="btn btn-outline-dark btn-sm">Editar</a>
            </td>

            <td>
                <a href="{{ route('personaPla.destroy', $personalPlaza->id) }}" 
                   class="btn btn-outline-dark btn-sm" 
                   onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar este registro?')) { document.getElementById('delete-form-{{ $personalPlaza->id }}').submit(); }">
                    Eliminar
                </a>
                <!-- Formulario oculto para la solicitud DELETE -->
                <form id="delete-form-{{ $personalPlaza->id }}" action="{{ route('personaPla.destroy', $personalPlaza->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </td>

            <td>
                <a href="{{ route('personaPla.ver', $personalPlaza->id) }}" class="btn btn-outline-dark btn-sm">Ver</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Paginación -->
{{ $personalPlazas->links() }}
