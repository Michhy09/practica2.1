@extends("menu1")

@section("contenido1")
@include("depto/tablahtml")
@endsection

@section("contenido2")
<h1>Ver datos</h1>
<form action="{{route('depto.destroy' , $depto)}}" method="post">
  @csrf 

  <div class="row mb-3">
    <label for="nombre" class="col-sm-2 col-form-label">ID Depto :</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="iddepto" name="iddepto" disabled value="{{$depto->iddepto}}">
    </div>
  </div>


    <div class="row mb-3">
        <label for="nombrePlaza" class="col-sm-2 col-form-label">Nombre Departamento :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="nombrePlaza" name="nombredepto" disabled value="{{$depto->nombredepto}}">
        </div>
      </div>

      <div class="row mb-3">
        <label for="nombrePlaza" class="col-sm-2 col-form-label">Nombre mediano :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="nombremediano" name="nombremediano" disabled value="{{$depto->nombremediano}}">
        </div>
      </div>

      <div class="row mb-3">
        <label for="nombrePlaza" class="col-sm-2 col-form-label">Nombre corto :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="nombrecorto" name="nombrecorto" disabled value="{{$depto->nombrecorto}}">
        </div>
      </div>
     

    
    <button type="submit" class="btn btn-danger">Eliminar</button>
    <a href="{{route("depto.index")}}" class="btn btn-primary">Regresar</a>
  </form>
@endsection