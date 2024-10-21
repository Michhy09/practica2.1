@extends("menu1")

@section("contenido2")

@if($accion == 'C')
    <h1>Insertando Carrera</h1>
    <form action="{{ route('carrera.store') }}" method="POST">
@elseif ($accion == 'E')
    <h1>Editando Carrera</h1>
    <form action="{{ route('carrera.update', $carrera->id) }}" method="POST">
@elseif ($accion == 'D')
    <h1>Detalles de la Carrera</h1>
    <form action="{{ route('carrera.index') }}" method="GET">
@endif

@csrf

<!-- Bloque de mensajes de error -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row mb-3">
    <div class="col-md-6">
        <label for="idcarrera" class="form-label">ID Carrera:</label>
        <input type="text" class="form-control" id="idcarrera" name="idcarrera" value="{{ old('idcarrera', $carrera->idcarrera ?? '') }}" {{$des}}>
        @error("idcarrera")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>


<!-- Campo para Nombre Carrera -->

    <div class="col-md-6">
        <label for="nombrecarrera" class="form-label">Nombre Carrera:</label>
        <input type="text" class="form-control" id="nombrecarrera" name="nombrecarrera" value="{{ old('nombrecarrera', $carrera->nombrecarrera) }}" {{$des}}>
        @error("nombrecarrera")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-6">
        <label for="nombremediano" class="form-label">Nombre Mediano:</label>
        <input type="text" class="form-control" id="nombremediano" name="nombremediano" value="{{ old('nombremediano', $carrera->nombremediano) }}" {{$des}}>
        @error("nombremediano")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-sm-6">
        <label for="nombrecorto" class="form-label">Nombre Corto:</label>
        <input type="text" class="form-control" id="nombrecorto" name="nombrecorto" value="{{ old('nombrecorto', $carrera->nombrecorto) }}" {{$des}}>
        @error("nombrecorto")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="depto_id" class="form-label">Departamento:</label>
        <select class="form-control" id="depto_id" name="depto_id" {{ $des }}>
            <option value="" disabled {{ old('depto_id', $carrera->depto_id ?? '') ? '' : 'selected' }}>Seleccione un Departamento</option>
            @foreach ($deptos as $depto)
                <option value="{{ $depto->id }}" {{ old('depto_id', $carrera->depto_id ?? '') == $depto->id ? 'selected' : '' }}>
                    {{ $depto->nombredepto }}
                </option>
            @endforeach
        </select>
        @error("depto_id")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>
        @if ($accion == 'C' || $accion == 'E') 
            <a href="{{ route('carrera.index') }}" class="btn btn-secondary">Regresar</a>
        @endif
    </div>
</div>

</form>

<!-- Tabla incluida -->
@include("carrera/tablahtml")

@endsection






