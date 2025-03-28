@extends('sidebar')

@section('title', 'Organizador')

@section('estilos_adicionales')
    <link href="{{ asset('css/calendario.css') }}" rel="stylesheet">
    <style>
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
                <button class="btn">Vista General</button>
                <button class="btn">Lista de Tareas</button>
                <a href="{{ route('calendar') }}" class="btn">Calendario</a>
            </div>
        </header>

        <div class="upcoming-tasks">
            <h3>Gestión de eventos y tareas</h3>
            <div class="task-list">
                <!-- Agregar Evento -->
                <div class="task bg-blue-500 text-white p-4 rounded-lg">
                    <h4>Agregar evento</h4>
                    <p>Programar sesiones de terapia, tiempo de meditación o bienestar.</p>
                    <button id="openEventModal" class="btn">Agregar</button>
                </div>

                <!-- Recordatorio -->
                <div class="task bg-blue-500 text-white p-4 rounded-lg">
                    <h4>Recordatorios</h4>
                    <p>Establecer notificaciones personalizadas.</p>
                    <button id="openReminderModal" class="btn">Restablecer</button>
                </div>

                <!-- Agregar Tarea -->
                <div class="task bg-blue-500 text-white p-4 rounded-lg">
                    <h4>Tarea rápida</h4>
                    <p>Agregar una nueva tarea con nivel de prioridad.</p>
                    <button id="openTaskModal" class="btn">Añadir</button>
                </div>
            </div>
        </div>

        <!-- Tareas Próximas -->
        <div class="mt-10">
            <h3 class="text-xl font-semibold">Tareas Próximas</h3>
            <div class="task-list">
                <div class="task-item">
                    <div>
                        <h4>Sesión de Terapia</h4>
                        <p>Fecha: 4 de octubre, 10:00 AM</p>
                    </div>
                    <div class="actions">
                        <button class="btn">Editar</button>
                        <button class="btn">Eliminar</button>
                    </div>
                </div>
                <div class="task-item">
                    <div>
                        <h4>Ejercicio de Meditación</h4>
                        <p>Fecha: 10 de octubre, 8:00 AM</p>
                    </div>
                    <div class="actions">
                        <button class="btn">Editar</button>
                        <button class="btn">Eliminar</button>
                    </div>
                </div>
                <div class="task-item">
                    <div>
                        <h4>Añadir al Diario de Ánimo</h4>
                        <p>Fecha: 10 de octubre, 9:00 PM</p>
                    </div>
                    <div class="actions">
                        <button class="btn">Editar</button>
                        <button class="btn">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notificaciones -->
        <div class="mt-10">
            <h3 class="text-xl font-semibold">Ajuste de Notificaciones</h3>
            <div class="notification-item">
                <div>
                    <p>Notificaciones Plus</p>
                </div>
                <button class="btn">Modificar</button>
            </div>
            <div class="notification-item">
                <div>
                    <p>Recordatorios por email</p>
                </div>
                <button class="btn">Modificar</button>
            </div>
        </div>

        <!-- Modal de Agregar Evento -->
        <div id="eventModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeEventModal">&times;</span>
                <h3>Agregar Evento</h3>
                <form>
                    <div>
                        <label for="event">Evento:</label>
                        <select id="event" name="event" class="form-input">
                            <option value="terapia">Sesión de Terapia</option>
                            <option value="meditacion">Meditación</option>
                            <option value="bienestar">Bienestar</option>
                        </select>
                    </div>
                    <div>
                        <label for="date">Fecha:</label>
                        <input type="date" id="date" name="date" class="form-input">
                    </div>
                    <div>
                        <label for="time">Hora:</label>
                        <input type="time" id="time" name="time" class="form-input">
                    </div>
                    <button type="submit" class="btn">Guardar</button>
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
