@extends("menu1")

@section("contenido2")

@if($accion == 'C')
    <h1>Insertando Lugar</h1>
    <form action="{{ route('lugar.store') }}" method="POST">
@elseif ($accion == 'E')
    <h1>Editando Lugar</h1>
    <form action="{{ route('lugar.update', $lugar->id) }}" method="POST">
@elseif ($accion == 'D')
    <h1>Detalles del Lugar</h1>
    <form action="{{ route('lugar.index') }}" method="GET">
@endif

@csrf

<!-- Campo para el nombre del lugar -->
<div class="row mb-3">
    <div class="col-md-6">
        <label for="nombrelugar" class="form-label">Nombre del Lugar:</label>
        <input type="text" class="form-control" id="nombrelugar" name="nombrelugar" value="{{ old('nombrelugar', $lugar->nombrelugar ?? '') }}" {{ $des }}>
        @error("nombrelugar")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<!-- Campo para el nombre corto del lugar -->
<div class="row mb-3">
    <div class="col-md-6">
        <label for="nombrecorto" class="form-label">Nombre Corto:</label>
        <input type="text" class="form-control" id="nombrecorto" name="nombrecorto" value="{{ old('nombrecorto', $lugar->nombrecorto ?? '') }}" {{ $des }}>
        @error("nombrecorto")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<!-- Campo para seleccionar el edificio -->
<div class="row mb-3">
    <div class="col-md-6">
        <label for="edificio_id" class="form-label">Edificio:</label>
        <select class="form-control" id="edificio_id" name="edificio_id" {{ $des }}>
            <option value="">Seleccione un edificio</option>
            @foreach($edificios as $edificio)
                <option value="{{ $edificio->id }}" {{ old('edificio_id', $lugar->edificio_id ?? '') == $edificio->id ? 'selected' : '' }}>
                    {{ $edificio->nombreedificio }}
                </option>
            @endforeach
        </select>
        @error("edificio_id")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<!-- Botones para enviar y regresar -->
<div class="row mb-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>
        @if ($accion == 'C' || $accion == 'E')
            <a href="{{ route('lugar.index') }}" class="btn btn-secondary">Regresar</a>
        @endif
    </div>
</div>

</form>
@include("lugar/tablahtml")

@endsection
