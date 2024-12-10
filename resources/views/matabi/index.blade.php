@extends("menu1")

@section("contenido1")

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="text-center ">Apertura de Materias</h3>

            <!-- Filtro de Periodo y Carrera -->
            <form action="{{ route('matabi.index') }}" method="get">
                
                    <!-- Filtro de Periodo -->
                    <div class="col-12">
                        <label for="idperiodo" class="font-weight-bold">Selecciona un Periodo</label>
                        <select name="idperiodo" id="idperiodo" class="form-control" onchange="this.form.submit()">
                            <option value="">Seleccionar Periodo</option>
                            @foreach ($periodos as $periodo)
                                <option value="{{ $periodo->id }}" 
                                    @if($periodo->id == session('periodo_id')) selected @endif>
                                    {{ $periodo->periodo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filtro de Carrera -->
                    <div class="col-12 ">
                        <label for="idcarrera" class="font-weight-bold">Selecciona una Carrera</label>
                        <select name="idcarrera" id="idcarrera" class="form-control" onchange="this.form.submit()">
                            <option value="">Seleccionar carrera</option>
                            @foreach ($carreras as $carr)
                                <option value="{{ $carr->id }}" 
                                    @if($carr->id == session('carrera_id')) selected @endif>
                                    {{ $carr->nombrecarrera }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-5">
        @for ($semestre = 1; $semestre <= 9; $semestre++)
            @php
                $materiasSemestre = $materiasPorSemestre[$semestre] ?? collect(); // Obtener materias del semestre actual
            @endphp
    
            @if ($materiasSemestre->isNotEmpty())
                <div class="col-md-4 col-sm-6 mb-4">
                    <form action="{{ route('matabi.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="eliminar" id="eliminar" value="NOELIMINAR">
                        
                        <div class="card">
                            <div class="card-header text-center bg-primary text-white">
                                <h5>Semestre {{ $semestre }}</h5>
                            </div>
                            <div class="card-body">
                                @foreach ($materiasSemestre as $materia)
    <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" 
            name="m{{ $materia->id }}" 
            value="{{ $materia->id }}" 
            onchange="enviar(this)"
            @if (in_array($materia->id, $materiasAbiertas)) checked @endif>
        <label class="form-check-label">
            {{ $materia->nombre }}
        </label>
    </div>
@endforeach

                            </div>
                        </div>
                    </form>
                </div>
            @else
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <div class="card-header text-center bg-secondary text-white">
                            <h5>Semestre {{ $semestre }}</h5>
                        </div>
                        <div class="card-body">
                            <p>No hay materias disponibles para este semestre.</p>
                        </div>
                    </div>
                </div>
            @endif
        @endfor
    </div>
    

    <script>
        function enviar(chbox) {
            chbox.form.eliminar.value = chbox.checked ? "NOELIMINAR" : chbox.value;
            chbox.form.submit();
        }
    </script>
    
@endsection
