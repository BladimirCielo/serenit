@extends('sidebar')

@section('title', 'SerenIT - Programar Cita')

@section('estilos_adicionales')
<link href="{{ asset('css/citas.css') }}" rel="stylesheet">
@endsection

@section('contenido')
<div class="cita-container">
    <h1 class="titulo-principal">SerenIT</h1>
    
    <div class="breadcrumb">
        <a href="{{ route('terapias') }}">Terapias</a> 
        <span>></span>
        <span>Programar Cita</span>
    </div>
    
    <div class="form-container">
        <h2 class="form-title">Programar Nueva Cita</h2>
        
        @if($terapeuta_seleccionado)
        <div class="terapeuta-seleccionado">
            <p><strong>Terapeuta preseleccionado:</strong> {{ $terapeuta_seleccionado->nombre_terapeuta }} - {{ $terapeuta_seleccionado->especialidad }}</p>
            <input type="hidden" name="terapeuta_id" value="{{ $terapeuta_seleccionado->id }}">
        </div>
        @endif
        
        <form id="citaForm" action="{{ route('citas.store') }}" method="POST">
            @csrf
            
            @if(!$terapeuta_seleccionado)
            <div class="form-group">
                <label for="terapeuta_id">Seleccione un terapeuta:</label>
                <select class="form-control" id="terapeuta_id" name="terapeuta_id" required>
                    <option value="">-- Seleccione un terapeuta --</option>
                    @foreach($terapeutas as $terapeuta)
                    <option value="{{ $terapeuta->id }}" {{ old('terapeuta_id') == $terapeuta->id ? 'selected' : '' }}>
                        {{ $terapeuta->nombre_terapeuta }} - {{ $terapeuta->especialidad }}
                    </option>
                    @endforeach
                </select>
            </div>
            @else
            <input type="hidden" name="terapeuta_id" value="{{ $terapeuta_seleccionado->id }}">
            @endif
            
            <div class="form-group">
                <label for="fecha">Fecha y hora de la cita</label>
                <input type="datetime-local" 
                       class="form-control" 
                       id="fecha" 
                       name="fecha" 
                       required
                       min="{{ now()->format('Y-m-d\TH:i') }}"
                       value="{{ old('fecha') }}">
            </div>
            
            <div class="form-group">
                <label for="duracion">Duración de la sesión</label>
                <select class="form-control" id="duracion" name="duracion" required>
                    <option value="">-- Seleccione duración --</option>
                    <option value="30" {{ old('duracion') == '30' ? 'selected' : '' }}>30 minutos</option>
                    <option value="45" {{ old('duracion') == '45' ? 'selected' : '' }}>45 minutos</option>
                    <option value="60" {{ old('duracion') == '60' ? 'selected' : '' }}>60 minutos</option>
                    <option value="90" {{ old('duracion') == '90' ? 'selected' : '' }}>90 minutos</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="notas">Notas adicionales (opcional)</label>
                <textarea class="form-control" 
                          id="notas" 
                          name="notas" 
                          rows="4" 
                          placeholder="Describa cualquier detalle importante para la sesión">{{ old('notas') }}</textarea>
            </div>
            
            <div class="form-actions">
                <a href="{{ route('terapias') }}" class="btn-cancelar">Cancelar</a>
                <button type="submit" class="btn-confirmar">
                    Confirmar Cita
                </button>
            </div>
        </form>
    </div>
</div>
@endsection