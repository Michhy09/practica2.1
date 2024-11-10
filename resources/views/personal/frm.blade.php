@extends("menu1")

@section("contenido2")

@if($accion == 'C')
    <h1>Insertando Personal</h1>
    <form action="{{ route('personal.store') }}" method="POST">
@elseif ($accion == 'E')
    <h1>Editando Personal</h1>
    <form action="{{ route('personal.update', $persona->id) }}" method="POST">
@elseif ($accion == 'D')
    <h1>Detalles del Personal</h1>
    <form action="{{ route('personal.index') }}" method="GET">
@endif

@csrf


<!-- Formulario de datos personales -->
<div class="row mb-3">
    <div class="col-md-6">
        <label for="RFC" class="form-label">RFC:</label>
        <input type="text" class="form-control" id="RFC" name="RFC" value="{{ old('RFC', $persona->RFC ?? '') }}" {{$des}}>
        @error("RFC")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="nombres" class="form-label">Nombres:</label>
        <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres', $persona->nombres ?? '') }}" {{$des}}>
        @error("nombres")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="apellidop" class="form-label">Apellido Paterno:</label>
        <input type="text" class="form-control" id="apellidop" name="apellidop" value="{{ old('apellidop', $persona->apellidop ?? '') }}" {{$des}}>
        @error("apellidop")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="apellidom" class="form-label">Apellido Materno:</label>
        <input type="text" class="form-control" id="apellidom" name="apellidom" value="{{ old('apellidom', $persona->apellidom ?? '') }}" {{$des}}>
        @error("apellidom")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<!-- Formulario de educación -->
<div class="row mb-3">
    <div class="col-md-6">
        <label for="licenciatura" class="form-label">Licenciatura:</label>
        <input type="text" class="form-control" id="licenciatura" name="licenciatura" value="{{ old('licenciatura', $persona->licenciatura ?? '') }}" {{$des}}>
        @error("licenciatura")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="lictit" class="form-label">¿Licenciatura Titulada?</label>
        <select class="form-control" id="lictit" name="lictit" {{$des}}>
            <option value="1" {{ old('lictit', $persona->lictit ?? '') == 1 ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ old('lictit', $persona->lictit ?? '') == 0 ? 'selected' : '' }}>No</option>
        </select>
        @error("lictit")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="especializacion" class="form-label">Especialización:</label>
        <input type="text" class="form-control" id="especializacion" name="especializacion" value="{{ old('especializacion', $persona->especializacion ?? '') }}" {{$des}}>
        @error("especializacion")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="esptit" class="form-label">¿Especialización Titulada?</label>
        <select class="form-control" id="esptit" name="esptit" {{$des}}>
            <option value="1" {{ old('esptit', $persona->esptit ?? '') == 1 ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ old('esptit', $persona->esptit ?? '') == 0 ? 'selected' : '' }}>No</option>
        </select>
        @error("esptit")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="maestria" class="form-label">Maestría:</label>
        <input type="text" class="form-control" id="maestria" name="maestria" value="{{ old('maestria', $persona->maestria ?? '') }}" {{$des}}>
        @error("maestria")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="maetit" class="form-label">¿Maestría Titulada?</label>
        <select class="form-control" id="maetit" name="maetit" {{$des}}>
            <option value="1" {{ old('maetit', $persona->maetit ?? '') == 1 ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ old('maetit', $persona->maetit ?? '') == 0 ? 'selected' : '' }}>No</option>
        </select>
        @error("maetit")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="doctorado" class="form-label">Doctorado:</label>
        <input type="text" class="form-control" id="doctorado" name="doctorado" value="{{ old('doctorado', $persona->doctorado ?? '') }}" {{$des}}>
        @error("doctorado")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="doctit" class="form-label">¿Doctorado Titulado?</label>
        <select class="form-control" id="doctit" name="doctit" {{$des}}>
            <option value="1" {{ old('doctit', $persona->doctit ?? '') == 1 ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ old('doctit', $persona->doctit ?? '') == 0 ? 'selected' : '' }}>No</option>
        </select>
        @error("doctit")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<!-- Fechas de ingreso -->
<div class="row mb-3">
    <div class="col-md-6">
        <label for="fechaingsep" class="form-label">Fecha de Ingreso SEP:</label>
        <input type="date" class="form-control" id="fechaingsep" name="fechaingsep" value="{{ old('fechaingsep', $persona->fechaingsep ?? '') }}" {{$des}}>
        @error("fechaingsep")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="fechaingins" class="form-label">Fecha de Ingreso Institucional:</label>
        <input type="date" class="form-control" id="fechaingins" name="fechaingins" value="{{ old('fechaingins', $persona->fechaingins ?? '') }}" {{$des}}>
        @error("fechaingins")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>
</div>

<!-- Departamento y Puesto -->
<div class="row mb-3">
    <div class="col-md-6">
        <label for="depto_id" class="form-label">Departamento:</label>
        <select class="form-control" id="depto_id" name="depto_id" {{ $des }}>
            <option value="" disabled {{ old('depto_id', $persona->depto_id ?? '') ? '' : 'selected' }}>Seleccione un Departamento</option>
            @foreach ($deptos as $depto)
                <option value="{{ $depto->id }}" {{ old('depto_id', $persona->depto_id ?? '') == $depto->id ? 'selected' : '' }}>
                    {{ $depto->nombredepto }}
                </option>
            @endforeach
        </select>
        @error("depto_id")
            <p class="text-danger">Error en: {{ $message }}</p>
        @enderror
    </div>

    
        <div class="col-md-6">
            <label for="puesto_id" class="form-label">Puesto:</label>
            <select class="form-control" id="puesto_id" name="puesto_id" {{ $des }}>
                <option value="" disabled {{ old('puesto_id', $persona->puesto_id ?? '') ? '' : 'selected' }}>Seleccione un Puesto</option>
                @foreach ($puestos as $puesto)
                    <option value="{{ $puesto->id }}" {{ old('puesto_id', $persona->puesto_id ?? '') == $puesto->id ? 'selected' : '' }}>
                        {{ $puesto->tipo }}
                    </option>
                @endforeach
            </select>
            @error("puesto_id")
                <p class="text-danger">Error en: {{ $message }}</p>
            @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>
        @if ($accion == 'C' || $accion == 'E') <!-- Mostrar botón de regresar solo en 'C' y 'E' -->
            <a href="{{ route('personal.index') }}" class="btn btn-secondary">Regresar</a>
        @endif
    </div>
</div>

</form>
@include("personal/tablahtml")

@endsection






