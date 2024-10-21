<style>
.pagination {
    font-size: 14px; /* Ajusta el tamaño de la fuente */
}

.pagination .page-link {
    padding: 8px 16px; /* Ajusta el espacio alrededor de los enlaces */
    font-size: 14px;   /* Ajusta el tamaño de los enlaces */
}

</style>

<br>
<h1>Departamentos</h1>
<hr>

    <!-- Botón agregar -->
    <a href="{{route('depto.create')}}" class="btn btn-outline-dark mb-3">Agregar Departamento</a>
<hr>
    <!-- Tabla de alumnos -->
    <div class="table-responsive-md">
        <table class="table table-striped table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th></th>
                    <th scope="col">ID Depto</th>
                    <th scope="col">Nombre Depto</th>
                    <th scope="col">Nombre mediano</th>
                    <th scope="col">Nombre corto</th>
                    <th scope="col" colspan="3" class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deptos as $depto)
                <tr>
                    <td scope="row">{{ $depto->id}}</td>
                    <td>{{ $depto->iddepto}}</td>
                    <td>{{ $depto->nombredepto}}</td>
                    <td>{{ $depto->nombremediano}}</td>
                    <td>{{ $depto->nombrecorto}}</td>
                   
                    <td><a href="{{ route('depto.editar',  $depto->id) }}" class="btn btn-outline-dark btn-sm">Editar</a></td>

<td>
    <a href="{{ route('depto.destroy', $depto->id) }}" 
       class="btn btn-outline-dark btn-sm" 
       onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar este departamento?')) { document.getElementById('delete-form-{{ $depto->id }}').submit(); }">
        Eliminar
    </a>

    <!-- Formulario oculto para enviar la petición DELETE -->
    <form id="delete-form-{{ $depto->id }}" action="{{ route('depto.destroy', $depto->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</td>

<td><a href="{{ route('depto.ver', $depto->id) }}" class="btn btn-outline-dark btn-sm">Ver</a></td>

                @endforeach
            </tbody>
        </table>

       
    </div>

     {{$deptos->links()}}