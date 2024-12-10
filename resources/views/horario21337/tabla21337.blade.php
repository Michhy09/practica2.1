<h2 class="text-center mb-4">Horarios</h2>

<!-- Botón para agregar un nuevo horario -->
<div class="mb-3 text-end">
    <a href="{{ route('horario21337.create') }}" class="btn btn-success btn-lg">Agregar Horario</a>
</div>

<!-- Tabla de horarios -->
<table class="table table-hover table-striped table-bordered">
    <thead class="thead-dark bg-primary text-white">
        <tr>
            <th>Día</th>
            <th>Hora</th>
            <th>Grupo</th>
            <th>Lugar</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse($horarios as $horario)
            <tr>
                <td>{{ $horario->dia }}</td>
                <td>{{ $horario->hora }}</td>

                <td>{{ $horario->grupo->grupo }}</td>
                <td>{{ $horario->lugar->nombrelugar }}</td>
                <td class="d-flex">
                    <a href="{{ route('horario21337.show', $horario->id) }}" class="btn btn-info btn-sm me-2">Ver</a>
                    <a href="{{ route('horario21337.edit', $horario->id) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                    
                    <!-- Formulario oculto para la solicitud DELETE -->
                    <form id="delete-form-{{ $horario->id }}" action="{{ route('horario21337.destroy', $horario->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    <button class="btn btn-danger btn-sm" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar este registro?')) { document.getElementById('delete-form-{{ $horario->id }}').submit(); }">
                        Eliminar
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">No hay horarios disponibles.</td>
            </tr>
        @endforelse
    </tbody>
</table>
