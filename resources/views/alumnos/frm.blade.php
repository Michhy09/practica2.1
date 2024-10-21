@extends("menu1")

@section("contenido2")

@if($accion == 'C')
    <h1>Insertando</h1>
    <form action="{{ route('alumnos.store') }}" method="POST">
@elseif ($accion == 'E')
    <h1>Editar</h1>
    <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
@elseif ($accion == 'D')
    <h1>Detalles del Alumno</h1>
    <form action="{{ route('alumnos.index') }}" method="GET">
@endif

@csrf 

<div class="row mb-3">
    <!-- Campo para No. Control -->
    <div class="col-md-6">
        <label for="noctrl" class="form-label text-start">No. Control:</label>
        <input type="text" class="form-control" id="noctrl" name="noctrl" value="{{ old('noctrl', $alumno->noctrl ?? '') }}" {{ $des }} >
        @error("noctrl")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <!-- Campo para Nombre -->
    <div class="col-md-6">
        <label for="nombre" class="form-label text-start">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $alumno->nombre ?? '') }}" {{ $des }} >
        @error("nombre")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <!-- Campo para Apellido Paterno -->
    <div class="col-md-6">
        <label for="apellidop" class="form-label text-start">Apellido Paterno:</label>
        <input type="text" class="form-control" id="apellidop" name="apellidop" value="{{ old('apellidop', $alumno->apellidop ?? '') }}" {{ $des }} >
        @error("apellidop")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <!-- Campo para Apellido Materno -->
    <div class="col-md-6">
        <label for="apellidom" class="form-label text-start">Apellido Materno:</label>
        <input type="text" class="form-control" id="apellidom" name="apellidom" value="{{ old('apellidom', $alumno->apellidom ?? '') }}" {{ $des }} >
        @error("apellidom")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <!-- Campo para Sexo -->
    <div class="col-md-6">
        <label for="sexo" class="form-label text-start">Sexo:</label>
        <select class="form-control" id="sexo" name="sexo" {{ $des }} >
            <option value="" disabled {{ old('sexo', $alumno->sexo ?? '') ? '' : 'selected' }}>Seleccione una opción</option>
            <option value="M" {{ old('sexo', $alumno->sexo ?? '') == 'M' ? 'selected' : '' }}>Masculino</option>
            <option value="F" {{ old('sexo', $alumno->sexo ?? '') == 'F' ? 'selected' : '' }}>Femenino</option>
        </select>
        @error("sexo")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <!-- Campo para Carrera -->
    <div class="col-md-6">
        <label for="carrera_id" class="form-label text-start">Carrera:</label>
        <select class="form-control" id="carrera_id" name="carrera_id" {{ $des }}>
            <option value="" disabled {{ old('carrera_id', $alumno->carrera_id ?? '') ? '' : 'selected' }}>Seleccione una carrera</option>
            @foreach ($carreras as $carrera)
                <option value="{{ $carrera->id }}" {{ old('carrera_id', $alumno->carrera_id ?? '') == $carrera->id ? 'selected' : '' }}>
                    {{ $carrera->nombrecarrera }} <!-- Asegúrate de que este sea el nombre correcto -->
                </option>
            @endforeach
        </select>
        @error("carrera_id")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

</div>

<div class="row mb-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>
        @if ($accion == 'C' || $accion == 'E') <!-- Mostrar botón de regresar solo en 'C' y 'E' -->
            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Regresar</a>
        @endif
    </div>
</div>

</form>

<!-- Mueve la inclusión de la tabla fuera del formulario -->
@include("alumnos/tablahtml")

@endsection




