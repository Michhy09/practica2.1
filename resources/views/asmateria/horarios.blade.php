<!-- grupos/horario.blade.php -->
<h2>Asignar Horarios para el Grupo: {{ $grupo->grupo }}</h2>
<form action="{{ route('asmateria.storeHorario', ['id' => $grupo->id]) }}" method="POST">
    @csrf

    <table>
        <tr>
            <th>Hora</th>
            <th>L</th>
            <th>M</th>
            <th>M</th>
            <th>J</th>
            <th>V</th>
        </tr>
        
        @foreach ($horas as $hora)
        <tr>
            <td>{{ $hora }}</td>
            @foreach (['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'] as $dia)
                <td>
                    <input type="checkbox" name="schedule[{{ $hora }}][{{ $dia }}]" value="1">
                </td>
            @endforeach
        </tr>
        @endforeach
    </table>

    <button type="submit">Guardar horario</button>
</form>
