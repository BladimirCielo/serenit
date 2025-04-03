@extends('sidebar')

@section('title', 'SerenIT - Programar Cita')

@section('estilos_adicionales')
<link href="{{ asset('css/terapia.css') }}" rel="stylesheet">
<style>
    /* Estilos generales */
    .container-centered {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
    
    /* Alertas */
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
    }
    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    .alert-warning {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeeba;
    }
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    
    /* Breadcrumb */
    .breadcrumb {
        padding: 10px 0;
        font-size: 0.9rem;
        margin-bottom: 20px;
    }
    
    /* Formulario */
    .form-container {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        margin: 20px 0;
    }
    
    .form-title {
        text-align: center;
        margin-bottom: 25px;
        color: #2c3e50;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #495057;
    }
    
    .form-control {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #ced4da;
        border-radius: 6px;
        font-size: 1rem;
    }
    
    .btn-submit {
        background-color: #28a745;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 1rem;
        font-weight: 500;
        width: 100%;
        margin-top: 10px;
        transition: background-color 0.3s;
    }
    
    .btn-submit:hover {
        background-color: #218838;
    }
    
    .text-danger {
        color: #dc3545;
        font-size: 0.875em;
        margin-top: 5px;
        display: block;
    }
    
    /* Tarjetas de terapeutas */
    .terapeutas-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }
    
    .especialista-card {
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        transition: transform 0.3s, box-shadow 0.3s;
    }
    
    .especialista-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .especialista-nombre {
        color: #2c3e50;
        margin-bottom: 5px;
    }
    
    .especialista-especialidad {
        color: #6c757d;
        font-size: 0.9rem;
    }
    
    .disponibilidad {
        color: #28a745;
        font-size: 0.85rem;
        margin: 8px 0;
    }
    
    .btn-programar {
        background-color: #4e73df;
        color: white;
        padding: 8px 15px;
        border-radius: 4px;
        text-decoration: none;
        display: inline-block;
        margin-top: 10px;
        border: none;
        cursor: pointer;
        width: 100%;
        text-align: center;
    }
    
    .btn-programar:hover {
        background-color: #3a5bc7;
    }
    
</style>
@endsection

@section('contenido')
<div class="container-centered">
    <h1 class="titulo-principal text-center">Programar Cita</h1>
    
    <div class="breadcrumb text-center">
        <a href="{{ route('dashboard') }}">Dashboard</a> 
        <span> > </span>
        <a href="{{ route('terapias') }}">Terapias</a>
        <span> > </span>
        <span>Programar Cita</span>
    </div>
    
    <!-- Mostrar mensajes de éxito/error -->
    @if(session('success'))
        <div class="alert alert-success">
            <strong>{{ session('success') }}</strong>
            @if(session('cita_data'))
            <ul class="mt-2 mb-0">
                <li><strong>Fecha:</strong> {{ session('cita_data')['fecha'] }}</li>
                <li><strong>Terapeuta:</strong> {{ session('cita_data')['terapeuta'] }}</li>
                <li><strong>Duración:</strong> {{ session('cita_data')['duracion'] }} minutos</li>
            </ul>
            @endif
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif

    <!-- Sección de Selección de Terapeuta -->
    <div class="seccion">
        @if(isset($terapeuta_seleccionado))
            <div class="form-container">
                <h2 class="form-title">Programar con {{ $terapeuta_seleccionado->nombre_terapeuta }}</h2>
                
                <form action="{{ route('citas.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_terapeuta" value="{{ $terapeuta_seleccionado->id_terapeuta }}">
                    
                    <div class="form-group">
                        <label for="fecha_cita">Fecha y Hora:</label>
                        <input type="datetime-local" class="form-control" id="fecha_cita" name="fecha_cita" 
                            required min="{{ date('Y-m-d\TH:i') }}" 
                            value="{{ old('fecha_cita') }}">
                        @error('fecha_cita')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="duracion">Duración (minutos):</label>
                        <select class="form-control" id="duracion" name="duracion" required>
                            <option value="30" {{ old('duracion') == '30' ? 'selected' : '' }}>30 minutos</option>
                            <option value="45" {{ old('duracion') == '45' ? 'selected' : '' }}>45 minutos</option>
                            <option value="60" {{ old('duracion') == '60' ? 'selected' : '' }}>60 minutos</option>
                            <option value="90" {{ old('duracion') == '90' ? 'selected' : '' }}>90 minutos</option>
                        </select>
                        @error('duracion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="notas">Notas adicionales:</label>
                        <textarea class="form-control" id="notas" name="notas" rows="3">{{ old('notas') }}</textarea>
                    </div>
                    
                    <button type="submit" class="btn-submit">Confirmar Cita</button>
                </form>
            </div>
        @elseif(isset($terapeutas) && count($terapeutas) > 0)
            <h2 class="form-title">Selecciona un terapeuta</h2>
            
            <div class="terapeutas-grid">
                @foreach($terapeutas as $terapeuta)
                    <div class="especialista-card">
                        <div class="especialista-info">
                            <h5 class="especialista-nombre">{{ $terapeuta->nombre_terapeuta }}</h5>
                            <p class="especialista-especialidad">{{ $terapeuta->especialidad }}</p>
                            <span class="disponibilidad">
                                <p>Terapeuta disponible</p>
                            </span>
                        </div>
                        <a href="{{ route('programar-cita', ['terapeutaId' => $terapeuta->id_terapeuta]) }}" class="btn-programar">
                            Seleccionar este terapeuta
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning">
                No hay terapeutas disponibles en este momento. Por favor, intenta más tarde.
            </div>
        @endif
    </div>
</div>
@endsection