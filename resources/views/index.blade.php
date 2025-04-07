@extends('sidebar')

@section('title', 'Dashboard')

@section('estilos_adicionales')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <style>
        #inicio { 
            background-color: rgb(223, 229, 255); 
        }

        /* Estilos para paneles */
        .dashboard-panels {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }

        .panel {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s ease;
        }

        .panel:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .panel-header {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #3f51b5;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .panel-icon {
            width: 24px;
            height: 24px;
        }

        /* Estilo para las tareas */
        .task-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .task-item {
            display: flex;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        .task-item:last-child {
            border-bottom: none;
        }

        .task-icon {
            margin-right: 15px;
            color: #5c6bc0;
        }

        .task-info {
            flex: 1;
        }

        .task-title {
            font-weight: 500;
            margin-bottom: 5px;
        }

        .task-date {
            font-size: 0.8rem;
            color: #666;
        }

        .task-actions {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            color: #757575;
            cursor: pointer;
            transition: color 0.2s;
        }

        .action-btn:hover {
            color: #3f51b5;
        }

        /* Estilo para el gráfico */
        .chart-panel {
            grid-column: span 2;
        }

        .chart-container {
            height: 300px;
            width: 100%;
        }

        /* Estilo para la tabla de sesiones */
        .sesiones-table {
            width: 100%;
            border-collapse: collapse;
        }

        .sesiones-table th, 
        .sesiones-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .sesiones-table th {
            background-color: #f5f5f5;
            font-weight: 600;
        }

        .badge-completado {
            background-color: #4caf50;
            color: white;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
        }

        .badge-pendiente {
            background-color: #ff9800;
            color: white;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
        }

        /* Mensaje sin sesiones */
        .no-data-message {
            text-align: center;
            padding: 20px;
            color: #666;
            font-style: italic;
        }

        /* Mensajes de alerta */
        .alert-message {
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #f8f9fa;
            border-left: 4px solid #6c757d;
            border-radius: 4px;
        }
    </style>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('contenido')
    <div class="dashboard-panels">
        <!-- Panel de Tareas Próximas -->
        <div class="panel">
            <div class="panel-header">
                <svg class="panel-icon" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,19H5V8H19M16,1V3H8V1H6V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3H18V1M17,12H12V17H17V12Z" />
                </svg>
                Tareas próximas
            </div>
            
            @if (Session::has('mensaje'))
                <div class="alert-message">
                    <strong>{{ Session::get('mensaje') }}</strong>
                </div>
            @endif
            
            @if(count($registrostasks) > 0)
                <ul class="task-list">
                    @foreach($registrostasks as $task)
                    <li class="task-item">
                        <div class="task-icon">
                            <svg viewBox="0 0 24 24" width="24" height="24">
                                <path fill="currentColor" d="M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z" />
                            </svg>
                        </div>
                        <div class="task-info">
                            <div class="task-title">{{$task->titulo}}</div>
                            <div class="task-date">{{$task->fecha}}</div>
                        </div>
                        <div class="task-actions">
                            <a href="{{ route('eventedit', ['id_evento' => $task->id_evento]) }}" class="action-btn">
                                <svg viewBox="0 0 24 24" width="18" height="18">
                                    <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                </svg>
                            </a>
                            <a href="{{ route('eliminarEvento', ['id_evento' => $task->id_evento]) }}" class="action-btn">
                                <svg viewBox="0 0 24 24" width="18" height="18">
                                    <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                                </svg>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            @else
                <div class="no-data-message">No tienes tareas próximas</div>
            @endif
        </div>

        <!-- Panel de Estado de Ánimo -->
        <div class="panel">
            <div class="panel-header">
                <svg class="panel-icon" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5M12,17.23C10.25,17.23 8.71,16.5 7.81,15.42L9.23,14C9.68,14.72 10.75,15.23 12,15.23C13.25,15.23 14.32,14.72 14.77,14L16.19,15.42C15.29,16.5 13.75,17.23 12,17.23M15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8C16.3,8 17,8.7 17,9.5C17,10.3 16.3,11 15.5,11Z" />
                </svg>
                Tu estado de ánimo
            </div>
            <div class="chart-container">
                {!! $generalchart->renderHtml() !!}
            </div>
        </div>

        <!-- Panel de Sesiones Previas -->
        <div class="panel" style="grid-column: span 2;">
            <div class="panel-header">
                <svg class="panel-icon" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12,3C16.97,3 21,7.03 21,12C21,16.97 16.97,21 12,21C7.03,21 3,16.97 3,12C3,7.03 7.03,3 12,3M12,5C8.14,5 5,8.14 5,12C5,15.86 8.14,19 12,19C15.86,19 19,15.86 19,12C19,8.14 15.86,5 12,5M13,11H11V7H13V11M13,15H11V13H13V15Z" />
                </svg>
                Tus sesiones previas
            </div>
            
            @if(isset($sesiones_previas) && count($sesiones_previas) > 0)
                <div class="table-responsive">
                    <table class="sesiones-table">
                        <thead>
                            <tr>
                                <th>Terapeuta</th>
                                <th>Fecha</th>
                                <th>Duración</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sesiones_previas as $sesion)
                            <tr>
                                <td>{{ $sesion['terapeuta'] }}</td>
                                <td>{{ $sesion['fecha'] }}</td>
                                <td>{{ $sesion['duracion'] }}</td>
                                <td>
                                    <span class="{{ $sesion['estado'] == 'Completado' ? 'badge-completado' : 'badge-pendiente' }}">
                                        {{ $sesion['estado'] }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="no-data-message">No tienes sesiones previas registradas</div>
            @endif
        </div>
    </div>

    <script>
        {!! $generalchart->renderChartJsLibrary() !!}
        {!! $generalchart->renderJs() !!}
    </script>
@endsection