@extends("menu1")

@section("contenido2")

@if($accion == 'C')
    <h1>Insertando</h1>
    <form action="{{ route('reticulas.store') }}" method="POST">
@elseif ($accion == 'E')
    <h1>Editar</h1>
    <form action="{{ route('reticulas.update', $reticula->id) }}" method="POST">
@elseif ($accion == 'D')
    <h1>Detalles de la Retícula</h1>
    <form action="{{ route('reticulas.index') }}" method="GET">
@endif

@csrf 

<div class="row mb-3">
    <div class="col-md-6">
        <label for="idreticula" class="form-label text-start">ID Retícula:</label>
        <input type="text" class="form-control" id="idreticula" name="idreticula" value="{{ old('idreticula', $reticula->idreticula ?? '') }}" {{$des}}>
        @error("idreticula")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="desc" class="form-label text-start">Descripción:</label>
        <input type="text" class="form-control" id="desc" name="desc" value="{{ old('desc', $reticula->desc) }}" {{$des}}>
        @error("desc")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-6">
        <label for="fechaVigor" class="form-label">Fecha Vigor:</label>
        <input type="date" class="form-control" id="fechaVigor" name="fechaVigor" value="{{ old('fechaVigor', $reticula->fechaVigor) }}" {{$des}}>
        @error("fechaVigor")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="idCarrera" class="form-label text-start">Carrera:</label>
        <select class="form-control" id="idCarrera" name="idCarrera" {{ $des }}>
            <option value="" disabled {{ old('idCarrera', $reticula->idCarrera ?? '') ? '' : 'selected' }}>Seleccione una Carrera</option>
            @foreach ($carreras as $carrera)
                <option value="{{ $carrera->id }}" {{ old('idCarrera', $reticula->idCarrera ?? '') == $carrera->id ? 'selected' : '' }}>
                    {{ $carrera->nombrecarrera }}
                </option>
            @endforeach
        </select>
        @error("idCarrera")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>


<div class="row mb-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>
        @if ($accion == 'C' || $accion == 'E') <!-- Mostrar botón de regresar solo en 'C' y 'E' -->
            <a href="{{ route('reticulas.index') }}" class="btn btn-secondary">Regresar</a>
        @endif
    </div>
</div>
</form>

<!-- Aquí es donde incluyes la tabla -->
@include("reticulas/tablahtml")

@endsection



