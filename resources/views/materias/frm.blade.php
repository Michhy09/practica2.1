@extends("menu1")

@section("contenido1")

@if($accion == 'C')
    <h1>Insertando Materia</h1>
    <form action="{{ route('materias.store') }}" method="POST">
@elseif ($accion == 'E')
    <h1>Editar Materia</h1>
    <form action="{{ route('materias.update', $materia->id) }}" method="POST">
@elseif ($accion == 'D')
    <h1>Detalles de la Materia</h1>
    <form action="{{ route('materias.index') }}" method="GET">
@endif

@csrf

<div class="col-sm-5">
    <!-- Campo para ID Materia -->
    <label for="idmateria" class="form-label">ID Materia:</label>
    <input type="text" class="form-control" id="idmateria" name="idmateria" value="{{ old('idmateria', $materia->idmateria) }}" {{$des}}>
    @error("idmateria")
        <p class="text-danger">Error en: {{ $message }}</p>
    @enderror
</div>

<div class="col-sm-5">
    <!-- Campo para Nombre -->
    <label for="nombre" class="form-label">Nombre:</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $materia->nombre) }}" {{$des}}>
    @error("nombre")
        <p class="text-danger">Error en: {{ $message }}</p>
    @enderror
</div>

<div class="col-sm-5">
    <!-- Campo para Nivel -->
    <label for="nivel" class="form-label">Nivel:</label>
    <input type="text" class="form-control" id="nivel" name="nivel" value="{{ old('nivel', $materia->nivel) }}" {{$des}}>
    @error("nivel")
        <p class="text-danger">Error en: {{ $message }}</p>
    @enderror
</div>

<div class="col-sm-5">
    <!-- Campo para Nombre Mediano -->
    <label for="nombremediano" class="form-label">Nombre Mediano:</label>
    <input type="text" class="form-control" id="nombremediano" name="nombremediano" value="{{ old('nombremediano', $materia->nombremediano) }}" {{$des}}>
    @error("nombremediano")
        <p class="text-danger">Error en: {{ $message }}</p>
    @enderror
</div>

<div class="col-sm-5">
    <!-- Campo para Nombre Corto -->
    <label for="nombrecorto" class="form-label">Nombre Corto:</label>
    <input type="text" class="form-control" id="nombrecorto" name="nombrecorto" value="{{ old('nombrecorto', $materia->nombrecorto) }}" {{$des}}>
    @error("nombrecorto")
        <p class="text-danger">Error en: {{ $message }}</p>
    @enderror
</div>

<div class="col-sm-5">
    <!-- Campo para Modalidad -->
    <label for="modalidad" class="form-label">Modalidad:</label>
    <input type="text" class="form-control" id="modalidad" name="modalidad" value="{{ old('modalidad', $materia->modalidad) }}" {{$des}}>
    @error("modalidad")
        <p class="text-danger">Error en: {{ $message }}</p>
    @enderror
</div>

<div class="col-sm-5">
    <!-- Campo para Semestre: Lista de opciones fijas -->
    <label for="semestre" class="form-label">Semestre:</label>
    <select class="form-control" id="semestre" name="semestre" {{$des}}>
        <!-- Aquí puedes cambiar los valores de los semestres según lo necesites -->
        <option value="1" {{ old('semestre', $materia->semestre) == '1' ? 'selected' : '' }}>1</option>
        <option value="2" {{ old('semestre', $materia->semestre) == '2' ? 'selected' : '' }}>2</option>
        <option value="3" {{ old('semestre', $materia->semestre) == '3' ? 'selected' : '' }}>3</option>
        <option value="4" {{ old('semestre', $materia->semestre) == '4' ? 'selected' : '' }}>4</option>
        <option value="5" {{ old('semestre', $materia->semestre) == '5' ? 'selected' : '' }}>5</option>
        <option value="6" {{ old('semestre', $materia->semestre) == '6' ? 'selected' : '' }}>6</option>
        <option value="7" {{ old('semestre', $materia->semestre) == '7' ? 'selected' : '' }}>7</option>
        <option value="8" {{ old('semestre', $materia->semestre) == '8' ? 'selected' : '' }}>8</option>
        <option value="9" {{ old('semestre', $materia->semestre) == '9' ? 'selected' : '' }}>9</option>
    </select>
    @error("semestre")
        <p class="text-danger">Error en: {{ $message }}</p>
    @enderror
</div>

<div class="col-sm-5">
    <!-- Campo para Retícula -->
    <label for="idReticula" class="form-label">Retícula:</label>
    <select class="form-control" id="idReticula" name="idReticula" {{$des}}>
        @foreach ($reticulas as $reticula)
            <option value="{{ $reticula->id }}" 
                {{ old('idReticula', $materia->idReticula) == $reticula->id ? 'selected' : '' }}>
                {{ $reticula->idreticula }}
            </option>
        @endforeach
    </select>
    @error("idReticula")
        <p class="text-danger">Error en: {{ $message }}</p>
    @enderror
</div>

<br>

<div class="row mb-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>
        @if ($accion == 'C' || $accion == 'E') <!-- Mostrar botón de regresar solo en 'C' y 'E' -->
            <a href="{{ route('materias.index') }}" class="btn btn-secondary">Regresar</a>
        @endif
    </div>
</div>

</form>

@include("materias/tablahtml")

@endsection
