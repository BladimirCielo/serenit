@extends('sidebar')

@section('title', 'SerenIT - Programar Cita')

@section('estilos_adicionales')
<link href="{{ asset('css/terapia.css') }}" rel="stylesheet">
<style>
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .alert-danger {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
    }
    .alert-warning {
        color: #8a6d3b;
        background-color: #fcf8e3;
        border-color: #faebcc;
    }
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
    }
    .especialista-card {
        background: white;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
    }
    .form-container {
        background: white;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin-top: 20px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    .form-control {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .btn-submit {
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .text-danger {
        color: #dc3545;
        font-size: 0.875em;
    }
    .close {
        float: right;
        font-size: 1.5rem;
        font-weight: 700;
        line-height: 1;
        color: #000;
        text-shadow: 0 1px 0 #fff;
        opacity: .5;
    }
</style>
@endsection

@section('contenido')
<div class="container-fluid">
    <div class="terapias-container">
        <h1 class="titulo-principal">Programar Cita</h1>
        
        <div class="breadcrumb">
            <a href="{{ route('dashboard') }}">Dashboard</a> 
            <span> > </span>
            <a href="{{ route('terapias') }}">Terapias</a>
            <span> > </span>
            <span>Programar Cita</span>
        </div>
        
        <!-- Mostrar mensajes de éxito/error -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('success') }}</strong>
                @if(session('cita_data'))
                <ul class="mt-2 mb-0">
                    <li><strong>Fecha:</strong> {{ session('cita_data')['fecha'] }}</li>
                    <li><strong>Terapeuta:</strong> {{ session('cita_data')['terapeuta'] }}</li>
                    <li><strong>Duración:</strong> {{ session('cita_data')['duracion'] }} minutos</li>
                </ul>
                @endif
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Sección de Selección de Terapeuta -->
        <div class="seccion">
            @if(isset($terapeuta_seleccionado))
                <h2 class="seccion-titulo">Programar Cita con {{ $terapeuta_seleccionado->nombre_terapeuta }}</h2>
                
                <div class="form-container">
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
                <h2 class="seccion-titulo">Selecciona un terapeuta</h2>
                
                <div class="row">
                    @foreach($terapeutas as $terapeuta)
                        <div class="col-md-4 mb-4">
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
</div>
@endsection