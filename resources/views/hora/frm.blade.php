@extends("menu1")

@section("contenido2")

@if($accion == 'C')
    <h1>Insertando Hora</h1>
    <form action="{{ route('hora.store') }}" method="POST">
@elseif ($accion == 'E')
    <h1>Editando Hora</h1>
    <form action="{{ route('hora.update', $hora->id) }}" method="POST">
@elseif ($accion == 'D')
    <h1>Detalles de la Hora</h1>
    <form action="{{ route('hora.index') }}" method="GET">
@endif

@csrf

<!-- Campo para la hora de inicio -->
<div class="row mb-3">
    <div class="col-md-6">
        <label for="hora_ini" class="form-label">Hora de Inicio:</label>
        <input type="time" class="form-control" id="hora_ini" name="hora_ini" value="{{ old('hora_ini', $hora->hora_ini ?? '') }}" {{$des}}>
        @error("hora_ini")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<!-- Campo para la hora de fin -->
<div class="row mb-3">
    <div class="col-md-6">
        <label for="hora_fin" class="form-label">Hora de Fin:</label>
        <input type="time" class="form-control" id="hora_fin" name="hora_fin" value="{{ old('hora_fin', $hora->hora_fin ?? '') }}" {{$des}}>
        @error("hora_fin")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<!-- Botones para enviar y regresar -->
<div class="row mb-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>
        @if ($accion == 'C' || $accion == 'E')
            <a href="{{ route('hora.index') }}" class="btn btn-secondary">Regresar</a>
        @endif
    </div>
</div>

</form>

</form>
@include("hora/tablahtml")

@endsection






