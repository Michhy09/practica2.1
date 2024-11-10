@extends("menu1")

@section("contenido2")

@if($accion == 'C')
    <h1>Insertando Personal Plaza</h1>
    <form action="{{ route('personaPla.store') }}" method="POST">
@elseif ($accion == 'E')
    <h1>Editando Personal Plaza</h1>
    <form action="{{ route('personaPla.update', $personalPlaza->id) }}" method="POST">
@elseif ($accion == 'D')
    <h1>Detalles de Personal Plaza</h1>
    <form action="{{ route('personaPla.index') }}" method="GET">
@endif

@csrf

<!-- Campo para tipo de nombramiento -->
<div class="row mb-3">
    <div class="col-md-6">
        <label for="tiponombramiento" class="form-label">Tipo de Nombramiento:</label>
        <input type="number" class="form-control" id="tiponombramiento" name="tiponombramiento" 
               value="{{ old('tiponombramiento', $personalPlaza->tiponombramiento ?? '') }}" {{$des}}>
        @error("tiponombramiento")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<!-- Campo para seleccionar Plaza -->
<div class="row mb-3">
    <div class="col-md-6">
        <label for="plaza_id" class="form-label">Plaza:</label>
        <select class="form-control" id="plaza_id" name="plaza_id" {{$des}}>
            <option value="" disabled {{ old('plaza_id', $personalPlaza->plaza_id ?? '') ? '' : 'selected' }}>Seleccione una Plaza</option>
            @foreach ($plazas as $plaza)
                <!-- Cambiar $plaza->id a $plaza->idplaza -->
                <option value="{{ $plaza->idplaza }}" {{ old('plaza_id', $personalPlaza->plaza_id ?? '') == $plaza->idplaza ? 'selected' : '' }}>
                    {{ $plaza->nombrePlaza }} <!-- Aquí sigue usando nombrePlaza correctamente -->
                </option>
            @endforeach
        </select>
        @error("plaza_id")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>


<!-- Campo para seleccionar Personal -->
<div class="row mb-3">
    <div class="col-md-6">
        <label for="personal_id" class="form-label">Personal:</label>
        <select class="form-control" id="personal_id" name="personal_id" {{$des}}>
            <option value="" disabled {{ old('personal_id', $personalPlaza->personal_id ?? '') ? '' : 'selected' }}>Seleccione Personal</option>
            @foreach ($personales as $persona)
            <option value="{{ $persona->id }}" {{ old('personal_id', $personalPlaza->personal_id ?? '') == $persona->id ? 'selected' : '' }}>
                {{ $persona->nombres }} {{ $persona->apellidop }} {{ $persona->apellidom }} <!-- Nombre completo -->
            </option>
        @endforeach
        
        </select>
        @error("personal_id")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<!-- Botones de Enviar y Regresar -->
<div class="row mb-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>
        @if ($accion == 'C' || $accion == 'E')
            <a href="{{ route('personaPla.index') }}" class="btn btn-secondary">Regresar</a>
        @endif
    </div>
</div>

</form>

@endsection
