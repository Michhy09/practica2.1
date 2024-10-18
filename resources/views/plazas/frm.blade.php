@extends("menu1")

@section("contenido1")

@if($accion == 'C')
    <h1>Insertando</h1>
    <form action="{{ route('plazas.store') }}" method="POST">
@elseif ($accion == 'E')
    <h1>Editar</h1>
    <form action="{{ route('plazas.update', $plaza->id) }}" method="POST">
@elseif ($accion == 'D')
   <form action="{{ route('plazas.index') }}" method="GET">
@endif

@csrf 


<div class="col-sm-5">
        <!-- Campo para ID Puesto -->
        <label for="idplaza" class="form-label">ID Plaza:</label>
        <input type="text" class="form-control" id="idplaza" name="idplaza" value="{{ old('idplaza', $plaza->idplaza) }}" {{$des}}>
        @error("idplaza")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-sm-5">
        <!-- Campo para Nombre -->
        <label for="nombrePlaza" class="form-label">Nombre Plaza:</label>
        <input type="text" class="form-control" id="nombrePlaza" name="nombrePlaza" value="{{ old('nombrePlaza', $plaza->nombrePlaza) }}" {{$des}}>
        @error("nombrePlaza")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    
<br>
<div class="row mb-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>
    </div>
</div>


</form>

@include("plazas/tablahtml")



@endsection





