@extends("menu1")

@section("contenido1")

@if($accion == 'C')
    <h1>Insertando</h1>
    <form action="{{ route('periodos.store') }}" method="POST">
@elseif ($accion == 'E')
    <h1>Editar</h1>
    <form action="{{ route('periodos.update', $periodo->id) }}" method="POST">
@elseif ($accion == 'D')
    <h1>Detalles del Periodo</h1>
   <form action="{{ route('periodos.index') }}" method="GET">
@endif

@csrf 


<div class="col-sm-5">
        <!-- Campo para ID Puesto -->
        <label for="idPeriodo" class="form-label">ID Periodo:</label>
        <input type="text" class="form-control" id="idPeriodo" name="idPeriodo" value="{{ old('idPeriodo', $periodo->idPeriodo) }}" {{$des}}>
        @error("idPeriodo")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-sm-5">
        <!-- Campo para Nombre -->
        <label for="periodo" class="form-label">Periodo :</label>
        <input type="text" class="form-control" id="periodo" name="periodo" value="{{ old('periodo', $periodo->periodo) }}" {{$des}}>
        @error("periodo")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-sm-5">
        <!-- Campo para Nombre -->
        <label for="descorta" class="form-label">Descripcion :</label>
        <input type="text" class="form-control" id="descorta" name="descorta" value="{{ old('descorta', $periodo->descorta) }}" {{$des}}>
        @error("descorta")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-sm-5">
        <!-- Campo para Nombre -->
        <label for="fechaInicio" class="form-label">Fecha de inicio :</label>
        <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" value="{{ old('fechaInicio', $periodo->fechaInicio) }}" {{$des}}>
        @error("fechaInicio")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-sm-5">
        <!-- Campo para Nombre -->
        <label for="fechaFin" class="form-label">Fecha finalizacion :</label>
        <input type="date" class="form-control" id="fechaFin" name="fechaFin" value="{{ old('fechaFin', $periodo->fechaFin) }}" {{$des}}>
        @error("fechaFin")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    
<br>

<div class="row mb-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>
        @if ($accion == 'C' || $accion == 'E') <!-- Mostrar botón de regresar solo en 'C' y 'E' -->
            <a href="{{ route('periodos.index') }}" class="btn btn-secondary">Regresar</a>
        @endif
    </div>
</div>


</form>

@include("periodos/tablahtml")



@endsection





