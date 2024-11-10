
<br>
<h1>Plazas</h1>
<hr>

    <!-- Botón agregar -->
    <a href="{{route('plazas.create')}}" class="btn btn-outline-dark mb-3">Agregar Plaza</a>
<hr>
    <!-- Tabla de alumnos -->
    <div class="table-responsive-md">
        <table class="table table-striped table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th></th>
                    <th scope="col">ID plaza</th>
                    <th scope="col">Nombre Plaza</th>
                    
                    <th scope="col" colspan="3" class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plazas as $plaza)
                <tr>
                    <td scope="row">{{ $plaza->id}}</td>
                    <td>{{ $plaza->idplaza}}</td>
                    <td>{{ $plaza->nombrePlaza}}</td>
                   
                    <td><a href="{{route('plazas.editar',  $plaza->id)}}" class="btn btn-outline-dark btn-sm">Editar</a></td>
                   
                    <td>
                        <a href="{{ route('plazas.destroy', $plaza->id) }}" 
                           class="btn btn-outline-dark btn-sm" 
                           onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar esta Plaza?')) { document.getElementById('delete-form-{{ $plaza->id }}').submit(); }">
                            Eliminar
                        </a>
                    
                        <!-- Formulario oculto para enviar la petición DELETE -->
                        <form id="delete-form-{{ $plaza->id }}" action="{{ route('plazas.destroy', $plaza->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
    
                    <td><a href="{{route('plazas.ver', $plaza->id)}}" class="btn btn-outline-dark btn-sm">Ver</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{$plazas->links()}}
    </div>