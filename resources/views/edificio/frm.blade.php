@extends("menu1")

@section("contenido2")

@if($accion == 'C')
    <h1>Insertando Edificio</h1>
    <form action="{{ route('edificio.store') }}" method="POST">
@elseif ($accion == 'E')
    <h1>Editando Edificio</h1>
    <form action="{{ route('edificio.update', $edificio->id) }}" method="POST">
@elseif ($accion == 'D')
    <h1>Detalles del Edificio</h1>
    <form action="{{ route('edificio.index') }}" method="GET">
@endif

@csrf

<!-- Campo para el nombre del edificio -->
<div class="row mb-3">
    <div class="col-md-6">
        <label for="nombreedificio" class="form-label">Nombre del Edificio:</label>
        <input type="text" class="form-control" id="nombreedificio" name="nombreedificio" value="{{ old('nombreedificio', $edificio->nombreedificio ?? '') }}" {{$des}}>
        @error("nombreedificio")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<!-- Campo para el nombre corto del edificio -->
<div class="row mb-3">
    <div class="col-md-6">
        <label for="nombrecorto" class="form-label">Nombre Corto:</label>
        <input type="text" class="form-control" id="nombrecorto" name="nombrecorto" value="{{ old('nombrecorto', $edificio->nombrecorto ?? '') }}" {{$des}}>
        @error("nombrecorto")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<!-- Botones para enviar y regresar -->
<div class="row mb-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>
        @if ($accion == 'C' || $accion == 'E')
            <a href="{{ route('edificio.index') }}" class="btn btn-secondary">Regresar</a>
        @endif
    </div>
</div>

</form>
@include("edificio/tablahtml")

@endsection






