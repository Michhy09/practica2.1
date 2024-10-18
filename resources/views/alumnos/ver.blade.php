@extends("plantillas/plantilla2")

@section("contenido1")
@include("alumnos/tablahtml")
@endsection

@section("contenido2")
<h1>Ver datos</h1>
<form action="{{route('alumnos.destroy' , $alumno)}}" method="post">
  @csrf 
    <div class="row mb-3">
        <label for="nombre" class="col-sm-2 col-form-label">Nombre :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="nombre" name="nombre" disabled value="{{$alumno->nombre}}">
        </div>
      </div>

      <div class="row mb-3">
        <label for="apellidop" class="col-sm-2 col-form-label">Apellido Paterno :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="apellidop" name="apellidop" disabled value="{{$alumno->apellidop}}">
        </div>
      </div>

      <div class="row mb-3">
        <label for="apellidop" class="col-sm-2 col-form-label">Apellido Materino :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="apellidop" name="apellidom" disabled value="{{$alumno->apellidop}}">
        </div>
      </div>

    
    <button type="submit" class="btn btn-danger">Eliminar</button>
    <a href="{{route("alumnos.index")}}" class="btn btn-primary">Regresar</a>
  </form>
@endsection