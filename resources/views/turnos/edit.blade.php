@extends("menu1")

@section('contenido1')
<div class="container-12">
    <h1 class="text-primary">Editar Turno</h1><br>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulario de edición de turno -->
    <div id="turnoForm" class="mb-4">
        <form action="{{ route('turnos.update', $turno) }}" method="POST">
            @csrf
            @method('PUT')  <!-- Indicamos que es un PUT para actualizar el turno -->

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" name="fecha" id="fecha" value="{{ old('fecha', $turno->fecha) }}" required>
            </div>
    
            <div class="mb-3">
                <label for="hora" class="form-label">Hora</label>
                <input type="time" class="form-control" name="hora" id="hora" value="{{ old('hora', $turno->hora) }}" required>
            </div>
    
            <div class="mb-3">
                <label for="codigocanal" class="form-label">Código Canal</label>
                <input type="text" class="form-control" name="codigocanal" id="codigocanal" value="{{ old('codigocanal', $turno->codigocanal) }}" required>
            </div>
    
            <div class="mb-3">
                <label for="alumnos_id" class="form-label">Alumno</label>
                <select class="form-control" name="alumnos_id" id="alumnos_id" required>
                    <option value="">Seleccione un alumno</option>
                    @foreach ($alumnos as $alumno)
                        <option value="{{ $alumno->id }}" {{ old('alumnos_id', $turno->alumnos_id) == $alumno->id ? 'selected' : '' }}>
                            {{ $alumno->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
    
            <button type="submit" class="btn btn-success" > Actualizar Turno</button>
        </form>
    </div>

</div>
@endsection


