@extends("menu1")

@section('contenido1')
<div class="container-12">
    <h1 class="text-primary">Gestión de Turnos</h1><br>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <button id="toggleFormButton" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Crear Turno
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulario oculto inicialmente -->
    <div id="turnoForm" class="mb-4" style="display: none;">
        <h1>{{ isset($turno) ? 'Editar Turno' : 'Crear Turno' }}</h1>
        <form action="{{ isset($turno) ? route('turnos.update', $turno) : route('turnos.store') }}" method="POST">
            @csrf
            @if (isset($turno))
                @method('PUT')
            @endif
    
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" name="fecha" id="fecha" value="{{ old('fecha', $turno->fecha ?? '') }}" required>
            </div>
    
            <div class="mb-3">
                <label for="hora" class="form-label">Hora</label>
                <input type="time" class="form-control" name="hora" id="hora" value="{{ old('hora', $turno->hora ?? '') }}" required>
            </div>
    
            <div class="mb-3">
                <label for="codigocanal" class="form-label">Código Canal</label>
                <input type="text" class="form-control" name="codigocanal" id="codigocanal" value="{{ old('codigocanal', $turno->codigocanal ?? '') }}" required>
            </div>
    
            <div class="mb-3">
                <label for="alumnos_id" class="form-label">Alumno</label>
                <select class="form-control" name="alumnos_id" id="alumnos_id" required>
                    <option value="">Seleccione un alumno</option>
                    @foreach ($alumnos as $alumno)
                        <option value="{{ $alumno->id }}" {{ old('alumnos_id', $turno->alumnos_id ?? '') == $alumno->id ? 'selected' : '' }}>
                            {{ $alumno->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
    
            <button type="submit" class="btn btn-success">{{ isset($turno) ? 'Actualizar' : 'Guardar' }}</button>
        </form>

    </div>


    <div class="table-responsive-12">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Código Canal</th>
                    <th>Alumno</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($turnos as $turno)
                    <tr class="text-center">
                        <td>{{ $turno->id }}</td>
                        <td>{{ $turno->fecha }}</td>
                        <td>{{ $turno->hora }}</td>
                        <td>{{ $turno->codigocanal }}</td>
                        <td>{{ $turno->alumno->nombre }}</td>
                        <td>
                            <a href="{{ route('turnos.edit', $turno) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            <form action="{{ route('turnos.destroy', $turno) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este turno?')">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">No hay turnos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('toggleFormButton').addEventListener('click', function () {
        const form = document.getElementById('turnoForm');
        // Cambiar el estilo entre mostrar y ocultar el formulario
        if (form.style.display === 'none' || form.style.display === '') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    });
</script>
@endsection
