@extends("menu1")

@section("contenido2")

@if($accion == 'C')
    <h1>Insertando</h1>
    <form action="{{ route('materias.store') }}" method="POST">
@elseif ($accion == 'E')
    <h1>Editar</h1>
    <form action="{{ route('materias.update', $materia->id) }}" method="POST">
@elseif ($accion == 'D')
    <h1>Detalles de la Materia</h1>
    <form action="{{ route('materias.index') }}" method="GET">
@endif

@csrf 

<div class="row mb-3">
    <div class="col-md-6">
        <label for="idmateria" class="form-label text-start">ID Materia:</label>
        <input type="text" class="form-control" id="idmateria" name="idmateria" value="{{ old('idmateria', $materia->idmateria ?? '') }}" {{$des}}>
        @error("idmateria")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
    
    <div class="col-md-6">
        <label for="nombre" class="form-label text-start">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $materia->nombre) }}" {{$des}}>
        @error("nombre")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="nivel" class="form-label text-start">Nivel:</label>
        <select class="form-control" id="nivel" name="nivel" {{ $des }}>
            <option value="" disabled {{ old('nivel', $materia->nivel ?? '') ? '' : 'selected' }}>Seleccione el nivel</option>
            <option value="1" {{ old('nivel', $materia->nivel ?? '') == '1' ? 'selected' : '' }}>1</option>
            <option value="2" {{ old('nivel', $materia->nivel ?? '') == '2' ? 'selected' : '' }}>2</option>
            <option value="3" {{ old('nivel', $materia->nivel ?? '') == '3' ? 'selected' : '' }}>3</option>
        </select>
        @error("nivel")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="nombremediano" class="form-label text-start">Nombre mediano:</label>
        <input type="text" class="form-control" id="nombremediano" name="nombremediano" value="{{ old('nombremediano', $materia->nombremediano) }}" {{$des}}>
        @error("nombremediano")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="nombrecorto" class="form-label text-start">Nombre corto:</label>
        <input type="text" class="form-control" id="nombrecorto" name="nombrecorto" value="{{ old('nombrecorto', $materia->nombrecorto) }}" {{$des}}>
        @error("nombrecorto")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="modalidad" class="form-label text-start">Modalidad:</label>
        <select class="form-control" id="modalidad" name="modalidad" {{ $des }}>
            <option value="" disabled {{ old('modalidad', $materia->modalidad ?? '') ? '' : 'selected' }}>Seleccione la modalidad</option>
            <option value="P" {{ old('modalidad', $materia->modalidad ?? '') == 'P' ? 'selected' : '' }}>Presencial</option>
            <option value="V" {{ old('modalidad', $materia->modalidad ?? '') == 'V' ? 'selected' : '' }}>Online</option>
            <option value="H" {{ old('modalidad', $materia->modalidad ?? '') == 'H' ? 'selected' : '' }}>Híbrido</option>
        </select>
        @error("modalidad")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="idReticula" class="form-label text-start">Retícula:</label>
        <select class="form-control" id="idReticula" name="idReticula" {{ $des }}>
            <option value="" disabled {{ old('idReticula', $materia->idReticula ?? '') ? '' : 'selected' }}>Seleccione una Retícula</option>
            @foreach ($reticulas as $reticula)
                <option value="{{ $reticula->id }}" {{ old('idReticula', $materia->idReticula ?? '') == $reticula->id ? 'selected' : '' }}>
                    {{ $reticula->desc }}
                </option>
            @endforeach
        </select>
        @error("idReticula")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>
        @if ($accion == 'C' || $accion == 'E') <!-- Mostrar botón de regresar solo en 'C' y 'E' -->
            <a href="{{ route('materias.index') }}" class="btn btn-secondary">Regresar</a>
        @endif
    </div>
</div>
</form>

<!-- Aquí es donde incluyes la tabla -->
@include("materias/tablahtml")

@endsection


