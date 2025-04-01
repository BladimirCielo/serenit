@extends('sidebar')

@section('title', 'SerenIT - Programar Cita')

@section('estilos_adicionales')
<link href="{{ asset('css/citas.css') }}" rel="stylesheet">
@endsection

@section('contenido')
<div class="cita-container">
    <h1 class="titulo-principal">SerenIT</h1>
    
    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Dashboard</a> 
        <span> > </span>
        <a href="{{ route('terapias') }}">Terapias</a>
        <span> > </span>
        <span>Programar Cita</span>
    </div>
    
    <div class="form-container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form id="citaForm" action="{{ route('citas.store') }}" method="POST">
            @csrf
            
            @if(auth()->check())
                <p>Usuario autenticado: {{ auth()->user()->nombre }}</p>
            @else
                <p class="text-danger">No hay usuario autenticado</p>
            @endif

            
            <div class="form-header">
                <h2>Programar Nueva Cita</h2>
            </div>

            @isset($terapeutas)
                @if($terapeutas->isNotEmpty())
                    @isset($terapeuta_seleccionado)
                        <div class="terapeuta-seleccionado">
                            <p><strong>Terapeuta preseleccionado:</strong> 
                            {{ $terapeuta_seleccionado->nombre_terapeuta }} - {{ $terapeuta_seleccionado->especialidad }}</p>
                            <input type="hidden" name="id_terapeuta" value="{{ $terapeuta_seleccionado->id_terapeuta }}">
                            <a href="{{ route('citas.create') }}" class="btn btn-sm btn-outline-secondary">
                                Cambiar terapeuta
                            </a>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="id_terapeuta">Seleccione un terapeuta:</label>
                            <select class="form-control" id="id_terapeuta" name="id_terapeuta" required>
                                <option value="">-- Seleccione un terapeuta --</option>
                                @foreach($terapeutas as $terapeuta)
                                    <option value="{{ $terapeuta->id_terapeuta }}" {{ old('id_terapeuta') == $terapeuta->id_terapeuta ? 'selected' : '' }}>
                                        {{ $terapeuta->nombre_terapeuta }} - {{ $terapeuta->especialidad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endisset
                @else
                    <div class="alert alert-warning">
                        No hay terapeutas disponibles actualmente.
                    </div>
                @endif
            @else
                <div class="alert alert-danger">
                    Error al cargar la lista de terapeutas. Por favor intente nuevamente.
                </div>
            @endisset

            <div class="form-group">
                <label for="fecha_cita">Fecha y hora:</label>
                <input type="datetime-local" class="form-control" id="fecha_cita" name="fecha_cita" 
                       required min="{{ now()->format('Y-m-d\TH:i') }}" value="{{ old('fecha_cita') }}"
                       onchange="validarHorario(this)">
                <small class="text-muted">Horario de atención: Lunes a Viernes de 9:00 AM a 6:00 PM</small>
            </div>

            <div class="form-group">
                <label for="duracion">Duración (minutos):</label>
                <select class="form-control" id="duracion" name="duracion" required>
                    <option value="">-- Seleccione --</option>
                    <option value="30" {{ old('duracion') == '30' ? 'selected' : '' }}>30 minutos</option>
                    <option value="45" {{ old('duracion') == '45' ? 'selected' : '' }}>45 minutos</option>
                    <option value="60" {{ old('duracion') == '60' ? 'selected' : '' }}>60 minutos</option>
                    <option value="90" {{ old('duracion') == '90' ? 'selected' : '' }}>90 minutos</option>
                </select>
            </div>

            <div class="form-group">
                <label for="notas">Notas adicionales:</label>
                <textarea class="form-control" id="notas" name="notas" rows="4"
                          placeholder="Describa cualquier detalle importante">{{ old('notas') }}</textarea>
            </div>

            <div class="form-actions">
                <a href="{{ route('terapias') }}" class="btn btn-cancelar">Cancelar</a>
                <button type="submit" class="btn btn-confirmar">Confirmar Cita</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
function validarHorario(input) {
    const fecha = new Date(input.value);
    const horas = fecha.getHours();
    const minutos = fecha.getMinutes();
    const dia = fecha.getDay(); // 0=Domingo, 1=Lunes, etc.
    
    // Validar día hábil (Lunes a Viernes)
    if(dia === 0 || dia === 6) {
        alert('No se permiten citas los fines de semana');
        input.value = '';
        return;
    }
    
    // Validar horario laboral (9AM a 6PM)
    if(horas < 9 || (horas >= 18 && minutos > 0)) {
        alert('El horario de atención es de 9:00 AM a 6:00 PM');
        input.value = '';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('citaForm').addEventListener('submit', function(e) {
        const fechaCita = new Date(document.getElementById('fecha_cita').value);
        const ahora = new Date();
        
        if (fechaCita <= ahora) {
            e.preventDefault();
            alert('La fecha y hora de la cita debe ser en el futuro');
            return false;
        }
        
        const duracion = document.getElementById('duracion').value;
        if (!duracion) {
            e.preventDefault();
            alert('Por favor seleccione la duración de la cita');
            return false;
        }
    });
});
</script>
@endsection