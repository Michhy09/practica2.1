@extends('menu1')

@section('contenido2')

@if($accion == 'C')
    <h1>Insertando</h1>
    <form action="{{ route('grupo21337.store') }}" method="POST">
        @csrf
@elseif ($accion == 'E')
    <h1>Editando</h1>
    <form action="{{ route('grupo21337.update', $grupo->id) }}" method="POST">
        @csrf        
@elseif ($accion == 'D')
    <h1>Detalles</h1>
    <form action="{{ route('grupo21337.index21337') }}" method="GET">
@endif

    @csrf

    <!-- Contenedor con Flexbox -->
    <div class="d-flex flex-wrap">
        <div class="form-group col-6">
            <label for="grupo">Grupo:</label>
            <input type="text" id="grupo" name="grupo" class="form-control" value="{{ old('grupo', $grupo->grupo ?? '') }}" {{ $des }}>
            @error('grupo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-6">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" class="form-control" value="{{ old('fecha', $grupo->fecha ?? '') }}" {{ $des }}>
            @error('fecha')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-6">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" class="form-control" {{ $des }}>{{ old('descripcion', $grupo->descripcion ?? '') }}</textarea>
            @error('descripcion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-6">
            <label for="max_alumnos">Máximo de Alumnos:</label>
            <input type="number" id="max_alumnos" name="max_alumnos" class="form-control" value="{{ old('max_alumnos', $grupo->max_alumnos ?? '') }}" {{ $des }}>
            @error('max_alumnos')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-6">
            <label for="periodo_id">Periodo:</label>
            <select id="periodo_id" name="periodo_id" class="form-control" {{ $des }}>
                <option value="">Seleccionar Periodo</option>
                @foreach($periodos as $periodo)
                    <option value="{{ $periodo->id }}" {{ (old('periodo_id', $grupo->periodo_id ?? '') == $periodo->id) ? 'selected' : '' }} {{ $des }}>
                        {{ $periodo->periodo }}
                    </option>
                @endforeach
            </select>
            @error('periodo_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-6">
            <label for="personal_id">Personal (opcional):</label>
            <select id="personal_id" name="personal_id" class="form-control" {{ $des }}>
                <option value="">Seleccionar Personal</option>
                @foreach($personals as $personal)
                    <option value="{{ $personal->id }}" {{ (old('personal_id', $grupo->personal_id ?? '') == $personal->id) ? 'selected' : '' }}>
                        {{ $personal->nombres }}
                    </option>
                @endforeach
            </select>
            @error('personal_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-6">
            <label for="materia_abierta_id">Materia Abierta:</label>
            <select id="materia_abierta_id" name="materia_abierta_id" class="form-control" {{ $des }}>
                <option value="">Seleccionar Materia Abierta</option>
                @foreach($materiasAbiertas as $materiaAbierta)
                    <option value="{{ $materiaAbierta->id }}" {{ (old('materia_abierta_id', $grupo->materia_abierta_id ?? '') == $materiaAbierta->id) ? 'selected' : '' }}>
                        {{ $materiaAbierta->materia->nombre }} 
                    </option>
                @endforeach
            </select>
            @error('materia_abierta_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>
            @if ($accion == 'C' || $accion == 'E')
                <a href="{{ route('grupo21337.index21337') }}" class="btn btn-secondary">Regresar</a>
            @endif
        </div>
    </div>
    <input type="hidden" name="grupo_id" value="{{ $grupo->id }}">

</form>
@include('grupo21337.tabla21337')
@include("horario21337/frm21337")

@endsection

