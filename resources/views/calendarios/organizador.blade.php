@extends('sidebar')

@section('title', 'Organizador')

@section('estilos_adicionales')
    <link href="{{ asset('css/organizacion.css') }}" rel="stylesheet">
    <style>
        #organizador { background-color: rgb(223, 229, 255); }
        /* Estilos para el Modal */
        .modal {
            display: none; 
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0); 
            background-color: rgba(0, 0, 0, 0.4); 
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 8px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007BFF; /* Color azul */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3; /* Azul más oscuro */
        }

        /* Estilos para Tareas Próximas */
        .task-item {
            background-color: #f0f4f8;
            padding: 15px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 8px;
        }

        .task-item .actions button {
            margin-left: 5px;
        }

        .notification-item {
            background-color: #f0f4f8;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
@endsection

@section('contenido')

    <div class="calendar-container">
        <header>
            <h2>Organización del tiempo</h2>
            <div class="controls">
                <a href="{{ route('index') }}" class="main-button">Calendario</a>
            </div>
        </header>
        
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="upcoming-tasks subcont registro-emocione">
        <h3>Gestión de eventos y tareas</h3>
        <div class="task-list mood-options">
            <!-- Agregar Evento -->
            <div class="mood-card task bg-blue-500 text-white p-4 rounded-lg">
                <div class="icon-card-cont">📄</div> 
                <h3>Agregar evento</h3>
                <p>Programar sesiones de terapia, tiempo de meditación o bienestar.</p>
                <button id="openEventModal" class="main-button">Agregar</button>
            </div>

            <!-- Recordatorio -->
            <div class="mood-card task bg-blue-500 text-white p-4 rounded-lg">
                <div class="icon-card-cont">🔔</div> 
                <h3>Recordatorios</h3>
                <p>Establecer notificaciones personalizadas.</p>
                <button id="openReminderModal" class="main-button">Restablecer</button>
            </div>

            <!-- Agregar Tarea -->
            <div class="mood-card task bg-blue-500 text-white p-4 rounded-lg">
                <div class="icon-card-cont">📋</div> 
                <h3>Tarea rápida</h3>
                <p>Agregar una nueva tarea con nivel de prioridad.</p>
                <button id="openTaskModal" class="main-button">Añadir</button>
            </div>
        </div>
    </div>

        <!-- Tareas Próximas -->
        <div class="recommendations">
            <h3 class="text-xl font-semibold">Tareas Próximas - Últimos 7 días</h3>
            <ul>
                @foreach($registrostasks as $task)
                <li>
                    <div class="icon-cont">
                        <svg class="iconos-nav" version="1.0" xmlns="http://www.w3.org/2000/svg"  width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"  preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" stroke="none"> <path d="M2489 4849 c-439 -46 -817 -352 -958 -775 -215 -644 159 -1320 822 -1485 118 -29 333 -36 456 -15 232 41 430 139 595 296 555 527 462 1420 -189 1821 -137 84 -306 141 -476 159 -106 11 -141 11 -250 -1z m301 -160 c219 -34 442 -165 597 -349 82 -98 165 -263 199 -395 32 -125 36 -314 10 -437 -87 -404 -407 -712 -815 -783 -434 -76 -878 161 -1067 571 -61 132 -86 248 -87 404 -1 160 17 252 72 386 96 229 263 406 486 515 199 96 380 123 605 88z"/> <path d="M2037 4019 c-63 -47 -73 -123 -29 -210 21 -43 45 -68 116 -122 49 -37 96 -67 103 -65 8 2 52 32 98 68 101 78 135 131 135 210 0 90 -48 140 -133 140 -34 0 -53 -6 -73 -24 l-28 -23 -34 23 c-45 31 -115 32 -155 3z"/> <path d="M2839 4026 c-42 -24 -62 -63 -61 -120 0 -28 5 -63 11 -78 15 -40 73 -100 152 -159 82 -60 75 -61 189 28 82 64 115 113 125 184 17 125 -105 205 -207 135 l-36 -24 -20 21 c-27 26 -116 34 -153 13z"/> <path d="M2305 3403 c24 -166 164 -282 325 -270 82 5 146 33 199 86 52 52 81 111 88 177 l6 54 -75 0 -75 0 -6 -36 c-13 -81 -103 -144 -184 -129 -49 9 -108 68 -122 123 l-12 42 -76 0 -75 0 7 -47z"/>
                            <path d="M696 4006 c-41 -64 -78 -101 -129 -127 -72 -37 -71 -91 1 -128 50 -26 87 -63 128 -127 29 -45 39 -54 64 -54 21 0 34 8 46 28 51 82 73 107 130 143 93 60 93 88 0 148 -57 36 -79 61 -130 144 -12 19 -25 27 -46 27 -25 0 -35 -9 -64 -54z"/> <path d="M4432 3967 c-37 -58 -62 -80 -145 -131 -23 -14 -28 -23 -25 -49 2 -25 14 -38 63 -71 32 -23 74 -61 92 -86 67 -93 68 -94 95 -87 16 4 36 22 49 44 33 56 77 101 137 139 73 48 70 71 -18 134 -41 29 -80 68 -106 106 -32 47 -46 60 -70 62 -28 3 -35 -3 -72 -61z"/> <path d="M945 2535 c-443 -83 -798 -411 -912 -842 -31 -120 -42 -336 -23 -465 87 -598 645 -1030 1249 -968 590 61 1032 547 1033 1135 0 66 -5 152 -12 190 -70 437 -391 800 -815 921 -153 44 -373 56 -520 29z m445 -168 c362 -94 623 -360 727 -737 27 -99 24 -367 -5 -472 -47 -171 -139 -331 -258 -452 -172 -174 -378 -273 -615 -294 -231 -21 -452 35 -643 162 -371 248 -532 704 -399 1131 104 336 396 597 753 674 130 28 305 24 440 -12z"/>
                            <path d="M674 1743 c-8 -10 -29 -37 -45 -61 -16 -23 -52 -56 -79 -73 -41 -25 -50 -36 -50 -59 0 -22 10 -34 53 -61 30 -20 66 -55 85 -84 19 -27 40 -54 48 -58 24 -14 53 3 74 42 21 41 73 92 120 116 42 22 42 68 0 90 -47 24 -99 75 -120 115 -26 52 -58 63 -86 33z"/> <path d="M1538 1748 c-8 -7 -29 -34 -47 -60 -18 -27 -52 -59 -77 -74 -80 -47 -80 -81 1 -128 28 -17 60 -49 85 -86 26 -39 48 -60 60 -60 12 0 35 21 58 53 45 59 73 86 120 113 40 23 42 56 6 81 -59 42 -88 69 -125 120 -41 55 -54 62 -81 41z"/> <path d="M1125 1305 c-5 -2 -22 -6 -37 -9 -34 -8 -84 -50 -113 -96 -85 -134 -67 -356 36 -459 151 -151 359 -6 359 250 0 126 -60 253 -139 293 -28 14 -90 27 -106 21z"/> <path d="M3780 2535 c-443 -83 -786 -389 -909 -810 -66 -229 -55 -511 29 -732 237 -620 959 -913 1559 -632 349 163 597 494 651 867 19 129 8 345 -23 465 -29 109 -102 270 -164 360 -175 254 -448 428 -758 483 -96 17 -295 17 -385 -1z m383 -156 c491 -100 828 -528 805 -1022 -7 -138 -35 -251 -94 -376 -223 -473 -755 -690 -1252 -510 -289 105 -527 371 -614 687 -29 105 -32 373 -5 472 52 190 128 328 256 463 228 242 579 353 904 286z"/> <path d="M3472 1679 c-52 -26 -89 -72 -108 -135 -8 -26 -14 -51 -14 -56 0 -4 36 -8 79 -8 76 0 79 1 85 25 14 55 99 58 119 5 11 -30 12 -30 90 -30 l78 0 -7 38 c-10 56 -50 119 -96 150 -58 38 -163 43 -226 11z"/> <path d="M4265 1681 c-51 -23 -101 -79 -114 -128 -20 -72 -19 -73 62 -73 70 1 73 2 92 33 26 41 67 48 101 16 13 -12 24 -28 24 -36 0 -10 19 -13 75 -13 l75 0 0 28 c-1 38 -32 102 -66 134 -62 58 -170 75 -249 39z"/> <path d="M3553 1148 c-35 -17 -49 -62 -34 -117 43 -164 173 -294 342 -342 57 -16 191 -16 248 0 138 39 247 129 307 254 20 42 38 94 41 116 5 35 2 44 -25 71 l-30 30 -414 -1 c-267 0 -421 -4 -435 -11z"/> </g>
                        </svg>
                    </div>
                    <div class="info-cont">
                        <div class="info">
                            <span>{{$task->titulo}}</span>
                            <p>{{$task->fecha}}</p>
                        </div>
                        <div class="actions">
                            <button class="main-button">Editar</button>
                            <button class="btn">Eliminar</button>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            </ul>
        </div>

        <!-- Notificaciones -->
        <div class="mt-10">
            <h3 class="text-xl font-semibold">Ajuste de Notificaciones</h3>
            <div class="notification-item">
                <div>
                    <p>Notificaciones Plus</p>
                </div>
                <button class="main-button">Modificar</button>
            </div>
            <div class="notification-item">
                <div>
                    <p>Recordatorios por email</p>
                </div>
                <button class="main-button">Modificar</button>
            </div>
        </div>

        <!-- Modal de Agregar Evento (LISTO) -->
        <div id="eventModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeEventModal">&times;</span>
                <form action="{{ asset('createevent') }}" method="post">
                    @csrf
                    <h3>Agregar evento</h3>
                    <div class="form-group">
                        <label>Titulo</label>
                        <input type="text" class="form-control" name="titulo">
                    </div>
                    <div class="form-group">
                        <label>Descripcion del Evento</label>
                        <input type="text" class="form-control" name="descripcion">
                    </div>
                    <div class="form-group">
                        <label>Fecha</label>
                        <input type="date" class="form-control" name="fecha">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-info" value="Guardar">
                </form>
            </div>
        </div>

        <!-- Modal de Recordatorio -->
        <div id="reminderModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeReminderModal">&times;</span>
                <h3>Recordatorio de Evento</h3>
                <p>Modifique o actualice el mensaje de recordatorio.</p>
                <textarea class="form-input" rows="4" placeholder="Escribe tu mensaje de recordatorio aquí..."></textarea>
                <button class="btn">Guardar Recordatorio</button>
            </div>
        </div>

        <!-- Modal de Agregar Tarea -->
        <div id="taskModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeTaskModal">&times;</span>
                <h3>Agregar Tarea</h3>
                <form>
                    <div>
                        <label for="taskName">Nombre de la Tarea:</label>
                        <input type="text" id="taskName" name="taskName" class="form-input" placeholder="Nombre de la tarea">
                    </div>
                    <div>
                        <label for="taskDescription">Descripción:</label>
                        <textarea id="taskDescription" name="taskDescription" class="form-input" rows="4" placeholder="Descripción de la tarea"></textarea>
                    </div>
                    <div>
                        <label for="priority">Prioridad:</label>
                        <select id="priority" name="priority" class="form-input">
                            <option value="alta">Alta</option>
                            <option value="media">Media</option>
                            <option value="baja">Baja</option>
                        </select>
                    </div>
                    <button type="submit" class="btn">Guardar Tarea</button>
                </form>
            </div>
        </div>

    </div>

    <script>
        // Modal de Evento
        var eventModal = document.getElementById("eventModal");
        var openEventModal = document.getElementById("openEventModal");
        var closeEventModal = document.getElementById("closeEventModal");

        openEventModal.onclick = function() {
            eventModal.style.display = "block";
        }
        closeEventModal.onclick = function() {
            eventModal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == eventModal) {
                eventModal.style.display = "none";
            }
        }

        // Modal de Recordatorio
        var reminderModal = document.getElementById("reminderModal");
        var openReminderModal = document.getElementById("openReminderModal");
        var closeReminderModal = document.getElementById("closeReminderModal");

        openReminderModal.onclick = function() {
            reminderModal.style.display = "block";
        }
        closeReminderModal.onclick = function() {
            reminderModal.style.display = "none";
        }

        // Modal de Tarea
        var taskModal = document.getElementById("taskModal");
        var openTaskModal = document.getElementById("openTaskModal");
        var closeTaskModal = document.getElementById("closeTaskModal");

        openTaskModal.onclick = function() {
            taskModal.style.display = "block";
        }
        closeTaskModal.onclick = function() {
            taskModal.style.display = "none";
        }
    </script>

@stop
