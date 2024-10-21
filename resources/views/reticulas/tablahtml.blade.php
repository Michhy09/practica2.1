<h1>Reticulas</h1>
<hr>

<!-- Botón agregar -->
<a href="{{ route('reticulas.create') }}" class="btn btn-outline-dark mb-3">Agregar Reticula</a>
<hr>

@if(session('mensaje'))
    <p>{{ session('mensaje') }}</p>
@endif

<!-- Tabla de alumnos -->
<div class="table-responsive-md">
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID Reticula</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Fecha Vigor</th>
                <th scope="col">Carrera</th>
               
                <th scope="col" colspan="3" class="text-center"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reticulas as $reticula)
            <tr>
                <td scope="row">{{ $reticula->idreticula }}</td>
    <td>{{ $reticula->desc }}</td>
    <td>{{ $reticula->fechaVigor }}</td>
    <td>{{ $reticula->carrera ? $reticula->carrera->nombrecarrera : 'Sin carrera' }}</td> 

                <td><a href="{{route('reticulas.editar',  $reticula->id)}}" class="btn btn-outline-dark btn-sm">Editar</a></td>
                
                <td>
                    <a href="{{ route('reticulas.destroy', $reticula->id) }}" 
                       class="btn btn-outline-dark btn-sm" 
                       onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar esta Reticula?')) { document.getElementById('delete-form-{{ $reticula->id }}').submit(); }">
                        Eliminar
                    </a>
                
                    <!-- Formulario oculto para enviar la petición DELETE -->
                    <form id="delete-form-{{ $reticula->id }}" action="{{ route('reticulas.destroy', $reticula->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>


                <td><a href="{{route('reticulas.ver', $reticula->id)}}" class="btn btn-outline-dark btn-sm">Ver</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$reticulas->links()}}
</div>

  
