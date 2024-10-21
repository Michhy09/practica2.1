
<br>
<h1>Periodos</h1>
<hr>

    <!-- Botón agregar -->
    <a href="{{route('periodos.create')}}" class="btn btn-outline-dark mb-3">Agregar Periodo</a>
<hr>
    <!-- Tabla de alumnos -->
    <div class="table-responsive-md">
        <table class="table table-striped table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th></th>
                    <th scope="col">ID periodo</th>
                    <th scope="col">Periodo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Fin</th>
                    
                    <th scope="col" colspan="3" class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($periodos as $periodo)
                <tr>
                    <td scope="row">{{ $periodo->id}}</td>
                    <td>{{ $periodo->idPeriodo}}</td>
                    <td>{{ $periodo->periodo}}</td>
                    <td>{{ $periodo->descorta}}</td>
                    <td>{{ $periodo->fechaInicio}}</td>
                    <td>{{ $periodo->fechaFin}}</td>
                   
                    <td><a href="{{route('periodos.editar',  $periodo->id)}}" class="btn btn-outline-dark btn-sm">Editar</a></td>
                   
                    <td>
                        <a href="{{ route('periodos.destroy', $periodo->id) }}" 
                           class="btn btn-outline-dark btn-sm" 
                           onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar esta Periiodo?')) { document.getElementById('delete-form-{{ $periodo->id }}').submit(); }">
                            Eliminar
                        </a>
                    
                        <!-- Formulario oculto para enviar la petición DELETE -->
                        <form id="delete-form-{{ $periodo->id }}" action="{{ route('periodos.destroy', $periodo->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
    
                    <td><a href="{{route('periodos.ver', $periodo->id)}}" class="btn btn-outline-dark btn-sm">Ver</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{$periodos->links()}}
    </div>