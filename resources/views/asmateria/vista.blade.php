<style>
    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        display: flex;
        flex-direction: column;
        
    }

    body {
        min-height: 100vh;
    }

    form {
        padding: 0px;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        /* border: 2px solid red; */
    }
    /* Reducir el espacio entre los form-groups pequeños */
    .form-group-small {
        max-width: 300px; /* Limitar el ancho */
        margin: 0 10px; /* Reducir el margen horizontal */
        padding: 5px; /* Reducir el espacio interior */
        flex: 1; /* Permitir que se ajusten en una fila */
    }

    /* Opcional: Estilo adicional para el contenedor de los grupos pequeños */
    .form-row-small {
        display: flex;
        flex-wrap: wrap;
        gap: 5px; /* Espacio mínimo entre los elementos */
        justify-content: flex-start; /* Alineación a la izquierda */
    }


    .content {
        width: 100%;
        max-width: 100%; /* Limita el ancho máximo del formulario */
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        /* border: 2px solid orange; */
        
        margin: 0 auto; /* Centra el formulario */
    }

    .form-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
        width: 100%;
        /* border: 2px solid blue; */
    }
    .form-group-wide {
    flex: 2; /* Prioridad mayor para que ocupe más espacio */
    max-width: 50%; /* Asegura que ocupe todo el espacio restante */
    margin-top: 20px; /* Separación superior */
    }


    .form-group-wide table {
        width: 370px; /* La tabla ocupa todo el ancho del contenedor */
        border-collapse: collapse; /* Elimina bordes dobles entre celdas */
    }

    .form-group-wide th, .form-group-wide td {
        padding: 12px; /* Espaciado interno en las celdas */
        text-align: center; /* Centra el texto en las celdas */
        border: 1px solid #ccc; /* Bordes para las celdas */
        width: 200px;
    }


    .form-row {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        justify-content: space-between;
        /* border: 2px solid green; */
    }

    .form-group {
        flex: 1;
        min-width: 160px;
        /* border: 2px solid yellow; */
    }

    .form-selects {
        display: flex;
        flex-direction: column;
        gap: 10px;
        flex: 1;
        min-width: 180px;
        
    }

    input[type="text"], input[type="date"], select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: inset 1px 1px 5px rgba(0, 0, 0, 0.1);
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    input[type="text"]:focus, input[type="date"]:focus, select:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        outline: none;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
        width: fit-content;
        align-self: center;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    #fecha {
        max-width: 314px;
        
    }

    #additionalFields {
        width: 100%;
        gap: 15px;
    }

    /* Ocultar los campos de radio por defecto */
    .personal, .lugar {
        display: none;
    }

    .lugar-nombre {
    display: block;
    margin-top: 5px;
    font-size: 0.9rem;
    color: #555;
}

</style>

{{-- CONTENIDO2 --}}
@section('contenido2')

@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger" role="alert">
   {{$error}}
  </div>
@endforeach
@endif

    @if ($accion=='C')
    <form id="myForm" action="{{route('asmateria.store')}}" method="POST">
    <h1>Asignacion de Grupos</h1>
    @endif

   


    @csrf
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="form-container">
                    <div class="form-row">
                        <!-- Fecha y Grupo -->
                        <div class="form-group">
                            <label for="fecha">Fecha:</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha') }}">
                            @error('fecha')
                                <p class="text-danger">Error en: {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="grupo">Grupo:</label>
    <input type="text" class="form-control" id="grupo" name="grupo"
           value="{{ old('grupo') }}"
           > <!-- Envío automático al perder foco -->
    @error('grupo')
        <p class="text-danger">Error en: {{ $message }}</p>
    @enderror
                        </div>

    
                        <!-- Máx. Alumnos y Descripción -->
                        <div class="form-group">
                            <label for="maxAlumnos">Máx. Alumnos:</label>
                            <input type="text" class="form-control" id="max_alumnos" name="max_alumnos" value="{{ old('max_alumnos') }}">
                            @error('max_alumnos')
                                <p class="text-danger">Error en: {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion') }}">
                            @error('descripcion')
                                <p class="text-danger">Error en: {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
    
                    <!-- Periodo y Carrera -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="idPeriodo">Periodo:</label>
                            <select id="idPeriodo" name="idPeriodo" class="form-control">
                                <option value="">Seleccionar Periodo</option>
                                @foreach($periodos as $periodo)
                                    <option value="{{ $periodo->id }}" {{ old('idPeriodo') == $periodo->id ? 'selected' : '' }}>
                                        {{ $periodo->periodo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id">Carrera:</label>
                            <select id="id" name="id" class="form-control">
                                <option value="">Seleccionar Carrera</option>
                                @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id }}" {{ old('idCarrera') == $carrera->id ? 'selected' : '' }}>
                                    {{ $carrera->nombrecarrera }}
                                </option>
                                                                @endforeach
                            </select>
                        </div>
                    </div>
    
                    <!-- Contenedor de Personales -->
                    <div id="personalContainer" class="form-group">
                        <label>Personales:</label>
                        <p>Seleccione una carrera para ver los personales disponibles.</p>
                    </div>
    
                    <!-- Botones -->
                    <div class="form-group">
                        <button type="button" id="iniciarHorario" class="btn btn-primary">Iniciar Horario</button>
                        <button type="submit" id="terminarHorario" class="btn btn-success" style="display: none;">Terminar Horario</button>
                    </div>
    
                    <!-- Sección Horario -->
                    <div id="edificioYHorario" style="display: none; margin-top: 20px;">
                        <h1>Horario Grupo</h1>
                        <form id="horarioForm" method="POST" action="{{ route('guardar.horario') }}">
                            @csrf
                            <div class="form-row">
                                <!-- Semestre -->
                                <div class="form-group">
                                    <label for="semestre">Semestre:</label>
                                    <select id="semestre" name="semestre" class="form-control">
                                        <option value="">Seleccione un Semestre</option>
                                        @for ($i = 1; $i <= 9; $i++)
                                            <option value="{{ $i }}">Semestre {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <!-- Materias -->
                                <div id="materiaContainer" class="form-group">
                                    <label>Materias:</label>
    @foreach ($materias as $materia)
        <div class="materia-option" 
             data-carrera="{{ $materia->reticula->idCarrera }}" 
             data-semestre="{{ $materia->semestre }}" 
             style="display: none;">
            <input type="radio" name="idMateria" value="{{ $materia->id }}">
            {{ $materia->nombre }}
        </div>
        
    @endforeach

    <input type="hidden" name="periodo_id" value="{{ old('periodo_id', $periodo_id) }}">
<input type="hidden" name="carrera_id" value="{{ old('carrera_id', $carrera_id) }}">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                </div>
                                </div>
                                
                                
                                
    
                                <!-- Edificio -->
                                <div class="form-group">
                                    <label for="edificio">Edificio:</label>
                                    <select id="edificio" name="nombreedificio" class="form-control">
                                        <option value="">Seleccionar Edificio</option>
                                        @foreach($edificios as $edificio)
                                            <option value="{{ $edificio->id }}">{{ $edificio->nombreedificio }}</option>
                                        @endforeach
                                    </select>
                                    
                                    <!-- Lugares -->
                                <div id="lugarContainer" class="form-group">
                                    <label>Lugares:</label>
                                    @foreach($lugares as $lugar)
                                    <div class="lugar" data-edificio-id="{{ $lugar->edificio_id }}" style="display: none;">
                                        <input type="radio" name="id" value="{{ $lugar->id }}" data-nombrecorto="{{ $lugar->nombrecorto }}">
                                        {{ $lugar->nombrelugar }}
                                    </div>
                                    
                                    @endforeach
                                </div>
                                    
                                </div>
                                
                                
                                
                                                                
                            </div>
    
                            <!-- Tabla de Horarios -->
                            <div class="form-group">
                                <label>Horario:</label>
                                <input type="hidden" id="grupo_id" name="grupo_id" value="{{ $grupo->id ?? '' }}">
                                <table class="table table-bordered">
    <thead>
        <tr>
            <th></th>
            <th>L</th>
            <th>M</th>
            <th>X</th>
            <th>J</th>
            <th>V</th>
        </tr>
    </thead>
    <tbody>
        @for ($i = 7; $i <= 21; $i++)
            <tr>
                <td>{{ $i }} - {{ $i + 1 }}</td>
                <td><input type="checkbox" name="horarios[]" value="1,{{ $i }}"></td> <!-- 1: Lunes -->
                <td><input type="checkbox" name="horarios[]" value="2,{{ $i }}"></td> <!-- 2: Martes -->
                <td><input type="checkbox" name="horarios[]" value="3,{{ $i }}"></td> <!-- 3: Miércoles -->
                <td><input type="checkbox" name="horarios[]" value="4,{{ $i }}"></td> <!-- 4: Jueves -->
                <td><input type="checkbox" name="horarios[]" value="5,{{ $i }}"></td> <!-- 5: Viernes -->
            </tr>
        @endfor
    </tbody>
</table>

                            </div>
    
                        </form>

                            
                        
                        
                      
                        
                        
                        


                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

   <script>


    
    // Función para prevenir la recarga y controlar el envío del formulario
    function preventFormSubmit(event) {
        event.preventDefault(); // Prevenir el comportamiento por defecto de envío del formulario
    }
    
    
    // Asignar preventFormSubmit a todos los formularios de la página
    document.querySelectorAll("form").forEach((form) => {
        form.addEventListener("submit", preventFormSubmit);
    });
    
    </script>
        @endsection

        <!-- Scripts FILTRAR PERSONAL -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const carreraSelect = document.getElementById("id");
                const personalContainer = document.getElementById("personalContainer");
        
                // Array de personales y carreras proporcionado por el servidor
                const carreras = @json($carreras);
                const personales = @json($personales);
        
                carreraSelect.addEventListener("change", function () {
                    const selectedCarreraId = parseInt(this.value, 10);
        
                    if (!selectedCarreraId) {
                        personalContainer.innerHTML = "<p>Seleccione una carrera para ver los personales disponibles.</p>";
                        return;
                    }
        
                    // Buscar la carrera seleccionada
                    const selectedCarrera = carreras.find(carrera => carrera.id === selectedCarreraId);
        
                    if (!selectedCarrera) {
                        personalContainer.innerHTML = "<p>Error al encontrar la carrera seleccionada.</p>";
                        return;
                    }
        
                    // Filtrar personales que pertenecen al mismo departamento
                    const filteredPersonales = personales.filter(
                        personal => personal.depto_id === selectedCarrera.depto_id
                    );
        
                    if (filteredPersonales.length > 0) {
                        const personalRadios = filteredPersonales.map(personal => `
                            <label>
                                <input type="radio" name="idPersonal" value="${personal.id}">
                                ${personal.nombres} ${personal.apellidop} ${personal.apellidom}
                            </label>
                        `).join("");
                        personalContainer.innerHTML = personalRadios;
                    } else {
                        personalContainer.innerHTML = "<p>No hay personales disponibles para esta carrera.</p>";
                    }
                });
        
                // Validación antes de enviar el formulario
                const form = document.getElementById("myForm");
                form.addEventListener("submit", function (event) {
                    const carreraId = carreraSelect.value;
                    if (!carreraId) {
                        event.preventDefault();
                        alert("Por favor, seleccione una carrera antes de enviar.");
                    }
                });
            });
        </script>

        <!-- Scripts CAMBIO BOTONES -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const iniciarHorarioButton = document.getElementById("iniciarHorario");
    const terminarHorarioButton = document.getElementById("terminarHorario");
    const edificioYHorario = document.getElementById("edificioYHorario");
    const grupoForm = document.getElementById("myForm");

    const grupoFields = [
        document.getElementById("fecha"),
        document.getElementById("grupo"),
        document.getElementById("max_alumnos"),
        document.getElementById("descripcion"),
        document.getElementById("idPeriodo"),
        document.getElementById("id")
    ];

    let grupoId = null; // Almacena el ID del grupo creado

    // Función para bloquear los campos del grupo
    function bloquearCampos() {
        grupoFields.forEach(field => {
            if (field) {
                field.disabled = true;
            }
        });
    }

    // Evento para "Iniciar Horario"
    iniciarHorarioButton.addEventListener("click", function () {
        console.log("Iniciando horario...");
        const formData = new FormData(grupoForm);

        fetch("{{ route('asmateria.store') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
            },
            body: formData,
        })
        .then((response) => response.json())
        .then((data) => {
            console.log("Formulario de grupo enviado");
            if (data.success) {
                grupoId = data.grupo_id;

                // Actualizar el campo oculto con el nuevo grupo_id
                const grupoIdInput = document.getElementById("grupo_id");
                if (grupoIdInput) {
                    grupoIdInput.value = grupoId;
                    console.log("Nuevo grupo_id establecido:", grupoId);
                } else {
                    console.error("Campo oculto grupo_id no encontrado.");
                }

                alert("Grupo creado exitosamente.");

                // Cambiar estado de botones y mostrar la sección de horarios
                iniciarHorarioButton.style.display = "none";
                terminarHorarioButton.style.display = "inline-block";

                // Mostrar formulario de horarios
                edificioYHorario.style.display = "block"; // Asegúrate de que este formulario esté visible ahora

                // Bloquear los campos de grupo
                bloquearCampos();
            } else {
                alert(`Error al crear el grupo: ${data.error}`);
            }
        })
        .catch((error) => {
            console.error("Error al enviar el formulario de grupo:", error);
        });
    });

    // Evento para "Terminar Horario"
    terminarHorarioButton.addEventListener("click", function (event) {
        event.preventDefault();

        // Recoger los datos del formulario para pasar a la URL
        const grupoData = new URLSearchParams(new FormData(grupoForm)).toString();

        // Redirigir a la página principal de asignación de materias con los datos como parámetros
        window.location.href = "{{ route('asmateria.index') }}?" + grupoData;
    });
});
</script>


        <!-- Scripts FILTRAR EDIFICIO-LUGAR -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const edificioSelect = document.getElementById("edificio");
        const lugares = document.querySelectorAll(".lugar");

        edificioSelect.addEventListener("change", function () {
            const selectedEdificioId = this.value;

            // Mostrar u ocultar lugares según el edificio seleccionado
            lugares.forEach((lugar) => {
                if (selectedEdificioId === "" || lugar.dataset.edificioId === selectedEdificioId) {
                    lugar.style.display = "block";
                } else {
                    lugar.style.display = "none";
                }
            });
        });
    });
</script>

        <!-- Scripts FILTRAR MATERIAS-SEMESTRE -->


        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const semestreSelect = document.getElementById("semestre");
                const materias = document.querySelectorAll(".materia-option");
        
                function filtrarMaterias() {
                    const selectedSemestre = semestreSelect.value;
        
                    materias.forEach((materia) => {
                        const materiaSemestre = materia.dataset.semestre;
        
                        // Mostrar materia solo si coincide con el semestre seleccionado
                        if (selectedSemestre === "" || materiaSemestre === selectedSemestre) {
                            materia.style.display = "block";
                        } else {
                            materia.style.display = "none";
                        }
                    });
                }
        
                // Escuchar cambios en el select de semestre
                semestreSelect.addEventListener("change", filtrarMaterias);
            });
        </script>
        

        <!-- Scripts AGREGAR HORARIOS-CHECKBOX -->

<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('input[name="horarios[]"]').forEach((checkbox) => {
        checkbox.addEventListener('change', function () {
            const [dia, hora] = this.value.split(',');  // Obtener el día y la hora del checkbox
            const lugarSeleccionado = document.querySelector('input[name="id"]:checked'); // Lugar seleccionado
            const grupoIdInput = document.getElementById('grupo_id');
            const grupoId = grupoIdInput ? grupoIdInput.value : null;  // Obtener el ID del grupo

            console.log('Valor de grupo_id obtenido:', grupoId);

            if (!grupoId) {
                alert('Error: No se pudo obtener el ID del grupo.');
                this.checked = false;
                return;
            }

            // Verificar si el checkbox fue marcado o desmarcado
            if (this.checked) {
                // Si está marcado, insertar el horario
                insertarHorario(dia, hora, lugarSeleccionado, grupoId);
            } else {
                // Si está desmarcado, eliminar el horario
                eliminarHorario(dia, hora, lugarSeleccionado, grupoId);
            }
        });
    });

    // Función para insertar el horario
    function insertarHorario(dia, hora, lugarSeleccionado, grupoId) {
        // Validación básica
        if (!grupoId || !lugarSeleccionado) {
            alert('Selecciona un lugar y asigna un grupo antes de continuar.');
            return;
        }

        const horaFormateada = hora.padStart(2, '0');
        const formData = new FormData();
        formData.append('grupo_id', grupoId);
        formData.append('lugar_id', lugarSeleccionado.value);
        formData.append('dia', dia);
        formData.append('hora', `${horaFormateada}:00`);

        console.log('Datos enviados al servidor para insertar:', {
            grupo_id: grupoId,
            lugar_id: lugarSeleccionado.value,
            dia,
            hora: `${horaFormateada}:00`,
        });

        // Enviar solicitud al backend para insertar el horario
        fetch("{{ route('guardar.horario') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            },
            body: formData,
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.error) {
                alert(`Error: ${data.error}`);
                this.checked = false;
            } else {
                alert(data.success);
            }
        })
        .catch((error) => {
            console.error('Error en el fetch:', error);
            alert('Horario empalmado con otro grupo.');
            this.checked = false;
        });
    }

    // Función para eliminar el horario
    function eliminarHorario(dia, hora, lugarSeleccionado, grupoId) {
        // Validación básica
        if (!grupoId || !lugarSeleccionado) {
            alert('Selecciona un lugar y asigna un grupo antes de continuar.');
            return;
        }

        const horaFormateada = hora.padStart(2, '0');
        const formData = new FormData();
        formData.append('grupo_id', grupoId);
        formData.append('lugar_id', lugarSeleccionado.value);
        formData.append('dia', dia);
        formData.append('hora', `${horaFormateada}:00`);

        console.log('Datos enviados al servidor para eliminar:', {
            grupo_id: grupoId,
            lugar_id: lugarSeleccionado.value,
            dia,
            hora: `${horaFormateada}:00`,
        });

        // Enviar solicitud al backend para eliminar el horario
        fetch("{{ route('eliminar.horario') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            },
            body: formData,
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.error) {
                alert(`Error: ${data.error}`);
            } else {
                alert('Horario eliminado exitosamente');
            }
        })
        .catch((error) => {
            console.error('Error en el fetch:', error);
            alert('Error al eliminar el horario.');
        });
    }
});


</script>




<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Obtenemos todos los radio buttons de las materias
        document.querySelectorAll('input[name="idMateria"]').forEach((radio) => {
            radio.addEventListener('change', function () {
                const materiaId = this.value;  // Obtener el ID de la materia seleccionada
                const carreraId = this.getAttribute('data-carrera');  // Obtener el ID de la carrera relacionada

                // Asignar los valores a los campos ocultos
                document.querySelector('input[name="carrera_id"]').value = carreraId;
                document.querySelector('input[name="periodo_id"]').value = '{{ old('periodo_id', $periodo_id) }}';  // Usar el valor de periodo_id desde la sesión

                // Si deseas enviar el formulario automáticamente, puedes descomentar esta línea:
                // document.querySelector('form').submit();
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
document.querySelectorAll('input[name="idMateria"]').forEach((radio) => {
radio.addEventListener('change', function () {
const materiaId = this.value;  // Obtener el ID de la materia seleccionada
const periodoId = document.getElementById('idPeriodo').value;  // Obtener el periodo seleccionado
const carreraId = document.getElementById('id').value;  // Obtener el ID de la carrera seleccionada

// Verificar que todos los campos necesarios estén seleccionados
if (!materiaId || !periodoId || !carreraId) {
alert('Por favor, selecciona una materia, un periodo y una carrera.');
return;
}

// Asignar los valores a los campos ocultos del formulario
document.getElementById('materia_id').value = materiaId;
document.getElementById('periodo_id').value = periodoId;
document.getElementById('carrera_id').value = carreraId;

// Enviar el formulario automáticamente
document.getElementById('materiaForm').submit();
});
});
});



       </script>