@extends("menu1")

@section("contenido1")
@include("puestos/tablahtml")
@endsection

@section("contenido2")
<h1>Ver datos</h1>
<form action="{{route('puestos.destroy' , $puesto)}}" method="post">
  @csrf 

  <div class="row mb-3">
    <label for="nombre" class="col-sm-2 col-form-label">ID Puseto :</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="idpuesto" name="idpuesto" disabled value="{{$puesto->idpuesto}}">
    </div>
  </div>


    <div class="row mb-3">
        <label for="nombre" class="col-sm-2 col-form-label">Nombre :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="nombre" name="nombre" disabled value="{{$puesto->nombre}}">
        </div>
      </div>

      <div class="row mb-3">
        <label for="apellidop" class="col-sm-2 col-form-label">Tipo :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="tipo" name="tipo" disabled value="{{$puesto->tipo}}">
        </div>
      </div>

    
    <button type="submit" class="btn btn-danger">Eliminar</button>
    <a href="{{route("puestos.index")}}" class="btn btn-primary">Regresar</a>
  </form>
@endsection