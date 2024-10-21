
<br>
<h1>Puestos</h1>
<hr>

    <!-- Botón agregar -->
    <a href="{{route('puestos.create')}}" class="btn btn-outline-dark mb-3">Agregar Puesto</a>
<hr>
    <!-- Tabla de alumnos -->
    <div class="table-responsive-md">
        <table class="table table-striped table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th></th>
                    <th scope="col">ID puesto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tipo</th>
                    <th scope="col" colspan="3" class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($puestos as $puesto)
                <tr>
                    <td scope="row">{{ $puesto->id}}</td>
                    <td>{{ $puesto->idpuesto}}</td>
                    <td>{{ $puesto->nombre}}</td>
                    <td>{{ $puesto->tipo}}</td>
                    <td><a href="{{route('puestos.editar',  $puesto->id)}}" class="btn btn-outline-dark btn-sm">Editar</a></td>
                    
                    <td>
                        <a href="{{ route('puestos.destroy', $puesto->id) }}" 
                           class="btn btn-outline-dark btn-sm" 
                           onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar este Puesto?')) { document.getElementById('delete-form-{{ $puesto->id }}').submit(); }">
                            Eliminar
                        </a>
                    
                        <!-- Formulario oculto para enviar la petición DELETE -->
                        <form id="delete-form-{{ $puesto->id }}" action="{{ route('puestos.destroy', $puesto->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
    
                    <td><a href="{{route('puestos.ver', $puesto->id)}}" class="btn btn-outline-dark btn-sm">Ver</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{$puestos->links()}}
    </div>