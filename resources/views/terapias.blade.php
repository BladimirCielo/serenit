@extends('sidebar')

@section('title', 'SerenIT - Terapias')

@section('estilos_adicionales')
<link href="{{ asset('css/terapia.css') }}" rel="stylesheet">
<style>
    /* Estilos para la sección de sesiones previas */
    .sesiones-previas-section {
        margin-top: 40px;
        padding-top: 30px;
        border-top: 1px solid #eaeaea;
    }

    .sesiones-previas-header {
        margin-bottom: 25px;
        color: #2c3e50;
        font-size: 1.5rem;
        font-weight: 600;
    }

    .sesiones-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 15px;
        margin-top: 20px;
    }

    .sesiones-table thead th {
        background-color: #f8f9fa;
        padding: 15px;
        text-align: left;
        font-weight: 600;
        color: #495057;
        border-bottom: 2px solid #dee2e6;
    }

    .sesiones-table tbody tr {
        background-color: white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        margin-bottom: 15px;
    }

    .sesiones-table tbody td {
        padding: 18px 15px;
        vertical-align: middle;
        border-top: 1px solid #f1f1f1;
    }

    .sesiones-table tbody tr:first-child td {
        border-top: none;
    }

    .badge-completado {
        background-color: #28a745;
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .badge-pendiente {
        background-color: #ffc107;
        color: #212529;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .sin-sesiones {
        background: #f8f9fa;
        padding: 30px;
        border-radius: 8px;
        text-align: center;
        color: #6c757d;
        margin: 30px 0;
        border: 1px dashed #dee2e6;
    }
</style>
@endsection

@section('contenido')
<div class="container-fluid">
    <!-- Notificación de éxito -->
    @if(session('success'))
    <div class="alert alert-success">
        <strong>¡Éxito!</strong> {{ session('success') }}
        @if(session('cita_data'))
        <ul class="mt-2 mb-0">
            <li><strong>Fecha:</strong> {{ date('d/m/Y H:i', strtotime(session('cita_data')['fecha'])) }}</li>
            <li><strong>Terapeuta:</strong> {{ session('cita_data')['terapeuta'] }}</li>
            <li><strong>Duración:</strong> {{ session('cita_data')['duracion'] }} minutos</li>
        </ul>
        @endif
    </div>
    @endif

    <div class="terapias-container">
        <h1 class="titulo-principal">SerenIT</h1>
        
        <div class="breadcrumb">
            <a href="{{ route('dashboard') }}">Dashboard</a> 
            <span> > </span>
            <span>Terapias</span>
        </div>
        
        <!-- Sección de Especialistas -->
        <div class="row">
    @foreach($especialistas as $terapeuta)
    <div class="col-md-4 mb-4">
        <div class="especialista-card">
            <div class="especialista-info">
            <h5 class="especialista-nombre">{{ $terapeuta['nombre'] }}</h5>
            <h6 class="especialista-especialidad">{{ $terapeuta['especialidad'] }}</h6>
            <span class="disponibilidad">
            @if ($terapeuta['disponibilidad'] == 'Disponibilidad inmediata')
    <!-- Mostrar terapeuta disponible -->
@endif                </span>
            </div>
            <a href="{{ route('programar-cita', ['terapeutaId' => $terapeuta['id']]) }}" class="btn-programar">
            Programar cita
</a>                
        </div>
    </div>
    @endforeach
</div>
        
        <!-- Sección de Sesiones Previas -->
        <!-- Sección de Sesiones Previas -->
<div class="sesiones-previas-section">
    <h2 class="sesiones-previas-header">Tus sesiones previas</h2>
    
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
    <div class="sin-sesiones">
        <p>No tienes sesiones previas registradas.</p>
    </div>
    @endif
</div>
        
        <!-- Sección de Emergencia -->
        <div class="seccion">
            <div class="emergencia-card">
                <h3 class="emergencia-titulo">Servicio de crisis</h3>
                <p>Ayuda inmediata en situaciones de emergencia emocional</p>
                <button class="btn-emergencia" onclick="window.open('https://humanamente.org.mx/n%C3%BAmeros-de-emergencia-en-caso-de-crisis', '_blank')">
                    Obtener ayuda ahora
                </button>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
@if(session('success'))
setTimeout(function() {
    document.querySelector('.alert-success').style.transition = 'opacity 1s';
    document.querySelector('.alert-success').style.opacity = '0';
    setTimeout(function() {
        document.querySelector('.alert-success').remove();
    }, 1000);
}, 5000);
@endif
</script>
@endsection
@endsection
