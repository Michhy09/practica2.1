@extends("menu1")

@section("contenido1")

@if($accion == 'C')
    <h1>Insertando</h1>
    <form action="{{ route('depto.store') }}" method="POST">
@elseif ($accion == 'E')
    <h1>Editar</h1>
    <form action="{{ route('depto.update', $depto->id) }}" method="POST">
@elseif ($accion == 'D')
   
    <form action="{{ route('depto.index', $depto->id) }}" method="get">
        
@endif

@csrf 


<div class="col-sm-5">
        <!-- Campo para ID Puesto -->
        <label for="idplaza" class="form-label">ID Depto:</label>
        <input type="text" class="form-control" id="iddepto" name="iddepto" value="{{ old('iddepto', $depto->iddepto) }}" {{$des}}>
        @error("iddepto")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-sm-5">
        <!-- Campo para Nombre -->
        <label for="nombredepto" class="form-label">Nombre del Departamento:</label>
        <input type="text" class="form-control" id="nombredepto" name="nombredepto" value="{{ old('nombredepto', $depto->nombredepto) }}" {{$des}}>
        @error("nombredepto")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-sm-5">
        <!-- Campo para Nombre -->
        <label for="nombremediano" class="form-label">Nombre mediano:</label>
        <input type="text" class="form-control" id="nombremediano" name="nombremediano" value="{{ old('nombredepto', $depto->nombremediano) }}" {{$des}}>
        @error("nombremediano")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-sm-5">
        <!-- Campo para Nombre -->
        <label for="nombrecorto" class="form-label">Nombre corto:</label>
        <input type="text" class="form-control" id="nombrecorto" name="nombrecorto" value="{{ old('nombrecorto', $depto->nombrecorto) }}" {{$des}}>
        @error("nombrecorto")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
    
<br>
    <div class="col-sm-5">
        <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>
        
    </div>
    

</form>

@include("depto/tablahtml")



@endsection





