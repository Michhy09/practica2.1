    <h2 class="text-center mb-4">Grupos</h2>

    <!-- Botón para agregar un nuevo grupo -->
    <div class="mb-3 text-end">
        <a href="{{ route('grupo21337.create') }}" class="btn btn-success btn-lg">Agregar Nuevo Grupo</a>
    </div>

    <!-- Tabla de grupos -->
        <table class="table table-hover table-striped table-bordered">
            <thead class="thead-dark bg-primary text-white">
                <tr>
                    <th>Grupo</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($grupos as $grupo)
                    <tr>
                        <td>{{ $grupo->grupo }}</td>
                        <td>{{ $grupo->descripcion }}</td>
                        <td>{{ $grupo->fecha }}</td>
                        <td class="d-flex">
                            <a href="{{ route('grupo21337.show', $grupo->id) }}" class="btn btn-info btn-sm me-2">Ver</a>
                            <a href="{{ route('grupo21337.edit', $grupo->id) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                            
                            <!-- Formulario oculto para la solicitud DELETE -->
                            <form id="delete-form-{{ $grupo->id }}" action="{{ route('grupo21337.destroy', $grupo->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button class="btn btn-danger btn-sm" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar este registro?')) { document.getElementById('delete-form-{{ $grupo->id }}').submit(); }">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay grupos disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    

    


