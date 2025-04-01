@extends('sidebar')

@section('title', 'SerenIT - Terapias')

@section('estilos_adicionales')
<link href="{{ asset('css/terapia.css') }}" rel="stylesheet">
@endsection

@section('contenido')
<div class="terapias-container">
    <h1 class="titulo-principal">SerenIT</h1>
    
    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Dashboard</a> 
        <span> > </span>
        <span>Terapias</span>
    </div>
    
    <div class="seccion">
        <h2 class="seccion-titulo">Especialistas disponibles</h2>
        
        @foreach($especialistas as $terapeuta)
        <div class="especialista-card">
            <div class="especialista-info">
                <div class="especialista-nombre">{{ $terapeuta['nombre'] }}</div>
                <div class="especialista-especialidad">{{ $terapeuta['especialidad'] }}</div>
                <div class="disponibilidad">{{ $terapeuta['disponibilidad'] }}</div>
            </div>
            <a href="{{ route('citas.create', ['terapeuta_id' => $terapeuta['id']]) }}" class="btn-programar">
                Programar sesión
            </a>
        </div>
        @endforeach
    </div>
    
    <div class="seccion">
        <h2 class="seccion-titulo">Tus sesiones previas</h2>
        
        @if(count($sesiones_previas) > 0)
        <table class="tabla-sesiones">
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
        @else
        <div class="sin-sesiones">
            <p>No tienes sesiones previas registradas.</p>
        </div>
        @endif
    </div>
    
    <div class="seccion">
        <div class="emergencia-card">
            <h3 class="emergencia-titulo">Servicio de crisis</h3>
            <p>Ayuda en emergencias</p>
            <button class="btn-emergencia" onclick="window.location.href='{{ route('emergencia') }}'">
                Obtener ayuda ahora
            </button>
        </div>
    </div>
</div>
@endsection