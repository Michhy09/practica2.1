<h1>Horas</h1>
<hr>

<!-- Botón agregar -->
<a href="{{ route('hora.create') }}" class="btn btn-outline-dark mb-3">Agregar Hora</a>
<hr>

@if(session('mensaje'))
    <p>{{ session('mensaje') }}</p>
@endif

<!-- Tabla de horas -->
<table class="table table-striped table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Hora de Inicio</th>
            <th scope="col">Hora de Fin</th>
            <th scope="col" colspan="3" class="text-center"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($horas as $hora)
        <tr>
            <td scope="row">{{ $hora->id }}</td>
            <td>{{ $hora->hora_ini }}</td>
            <td>{{ $hora->hora_fin }}</td>

            <!-- Botones de acción -->
            <td><a href="{{ route('hora.editar', $hora->id) }}" class="btn btn-outline-dark btn-sm">Editar</a></td>
            <td>
                <a href="{{ route('hora.destroy', $hora->id) }}" 
                   class="btn btn-outline-dark btn-sm" 
                   onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar este registro?')) { document.getElementById('delete-form-{{ $hora->id }}').submit(); }">
                    Eliminar
                </a>
                <form id="delete-form-{{ $hora->id }}" action="{{ route('hora.destroy', $hora->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
            <td><a href="{{ route('hora.ver', $hora->id) }}" class="btn btn-outline-dark btn-sm">Ver</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $horas->links() }}
