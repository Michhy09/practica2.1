

@if($accion == 'C')
    <h1>Insertando Horario</h1>
    <form action="{{ route('horario21337.store') }}" method="POST">
        @csrf
@elseif ($accion == 'E')
    <h1>Editando Horario</h1>
    <form action="{{ route('horario21337.update', $horario->id ?? '') }}" method="POST">
        @csrf
        @method('POST')
@endif


    @csrf

    <!-- Contenedor con Flexbox -->
    <div class="d-flex flex-wrap">

        <div class="form-group col-6">
            <label for="grupo_id">Grupo:</label>
            <select id="grupo_id" name="grupo_id" class="form-control" {{ $des }}>
                @foreach($grupos as $grupo)
    <option value="{{ $grupo->id }}" {{ (old('grupo_id', $horario->grupo_id ?? '') == $grupo->id) ? 'selected' : '' }}>
        {{ $grupo->grupo }}
    </option>
@endforeach
           
            </select>
            @error('grupo_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-6">
            <label for="lugar_id">Lugar:</label>
            <select id="lugar_id" name="lugar_id" class="form-control" {{ $des }}>
                <option value="">Seleccionar Lugar</option>
                @foreach($lugares as $lugar)
                    <option value="{{ $lugar->id }}" {{ (old('lugar_id', $horario->lugar_id ?? '') == $lugar->id) ? 'selected' : '' }}>
                        {{ $lugar->nombrelugar }}
                    </option>
                @endforeach
            </select>
            @error('lugar_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-6">
            <label for="dia">Día:</label>
<!-- Ejemplo de un campo select para 'dia' -->
<input type="text" id="dia" name="dia" class="form-control" value="{{ old('hora', $horario->dia ?? '') }}" {{ $des }}>

@error('dia')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-6">
            <label for="hora">Hora:</label>
            <input type="text" id="hora" name="hora" class="form-control" value="{{ old('hora', $horario->hora ?? '') }}" {{ $des }}>
            @error('hora')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        

       


    </div>

    <div class="row mb-3">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>
            @if ($accion == 'C' || $accion == 'E')
                <a href="{{ route('horario21337.index21337') }}" class="btn btn-secondary">Regresar</a>
            @endif
        </div>
    </div>
</form>

