@extends("menu1")

@section("contenido1")

@if($accion == 'C')
    <h1>Insertando</h1>
    <form action="{{ route('puestos.store') }}" method="POST">
@elseif ($accion == 'E')
    <h1>Editar</h1>
    <form action="{{ route('puestos.update', $puesto->id) }}" method="POST">
@elseif ($accion == 'D')
    
<form action="{{ route('puestos.index') }}" method="GET">
@endif

@csrf 


<div class="col-sm-5">
        <!-- Campo para ID Puesto -->
        <label for="idpuesto" class="form-label">ID Puesto:</label>
        <input type="text" class="form-control" id="idpuesto" name="idpuesto" value="{{ old('idpuesto', $puesto->idpuesto) }}" {{$des}}>
        @error("idpuesto")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-sm-5">
        <!-- Campo para Nombre -->
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $puesto->nombre) }}" {{$des}}>
        @error("nombre")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-sm-5">
        <!-- Campo para Tipo -->
        <label for="tipo" class="form-label">Tipo:</label>
        <input type="text" class="form-control" id="tipo" name="tipo" value="{{ old('tipo', $puesto->tipo) }}" {{$des}}>
        @error("tipo")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
<br>
    <div class="col-sm-5">
        <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>
        
    </div>
    <br>
    


</form>

@include("puestos/tablahtml")



@endsection





