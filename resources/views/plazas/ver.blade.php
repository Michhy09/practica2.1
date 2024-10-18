@extends("menu1")

@section("contenido1")
@include("plazas/tablahtml")
@endsection

@section("contenido2")
<h1>Ver datos</h1>
<form action="{{route('plazas.destroy' , $plaza)}}" method="post">
  @csrf 

  <div class="row mb-3">
    <label for="nombre" class="col-sm-2 col-form-label">ID Puseto :</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="idplaza" name="idplaza" disabled value="{{$plaza->idpuesto}}">
    </div>
  </div>


    <div class="row mb-3">
        <label for="nombrePlaza" class="col-sm-2 col-form-label">Nombre Plaza :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="nombrePlaza" name="nombrePlaza" disabled value="{{$plaza->nombrePlaza}}">
        </div>
      </div>

     

    
    <button type="submit" class="btn btn-danger">Eliminar</button>
    <a href="{{route("plazas.index")}}" class="btn btn-primary">Regresar</a>
  </form>
@endsection