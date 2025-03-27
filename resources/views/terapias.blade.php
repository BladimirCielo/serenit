@extends('sidebar')

@section('title', 'SerenIT - Terapias')

@section('estilos_adicionales')
<link href="{{ asset('css/terapias.css') }}" rel="stylesheet">
@endsection

@section('contenido')
<div class="terapias-container">
    <div class="header">
        <h1 class="titulo-principal">SerenIT</h1>
        <div class="user-info">{{ $usuario }}</div>
    </div>
    
    <div class="breadcrumb">{{ $breadcrumb }}</div>
    
    <div class="seccion">
        <h2 class="seccion-titulo">Especialistas disponibles</h2>
        
        @foreach($especialistas as $especialista)
        <div class="especialista-card">
            <div class="especialista-info">
                <div class="especialista-nombre">{{ $especialista['nombre'] }}</div>
                <div class="especialista-especialidad">{{ $especialista['especialidad'] }}</div>
                <div class="disponibilidad">{{ $especialista['disponibilidad'] }}</div>
            </div>
            <button class="btn-programar">Programar sesión</button>
        </div>
        @endforeach
    </div>
    
    <div class="seccion">
        <h2 class="seccion-titulo">Sesiones previas</h2>
        
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
                    <td><span class="badge-completado">{{ $sesion['estado'] }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="seccion">
        <div class="emergencia-card">
            <h3 class="emergencia-titulo">Servicio de crisis</h3>
            <p>Ayuda en emergencias</p>
            <button class="btn-emergencia">Obtener ayuda ahora</button>
        </div>
    </div>
</div>
@endsection