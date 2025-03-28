@extends('sidebar')

@section('title', 'SerenIT - Terapias')

@section('estilos_adicionales')
<link href="{{ asset('css/terapias.css') }}" rel="stylesheet">
<style>
    #terapia { background-color: rgb(223, 229, 255); }

    .terapias-container {
        padding: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .titulo-principal {
        color: #2c3e50;
        margin-bottom: 1.5rem;
    }
    
    .breadcrumb {
        color: #6c757d;
        margin-bottom: 2rem;
        font-size: 0.9rem;
    }
    
    .seccion {
        margin-bottom: 3rem;
        background: white;
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .seccion-titulo {
        color: #4e73df;
        margin-bottom: 1.5rem;
        font-size: 1.25rem;
    }
    
    .especialista-card {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
        border: 1px solid #e0e0e0;
        border-radius: 6px;
        margin-bottom: 1rem;
    }
    
    .especialista-info {
        flex: 1;
    }
    
    .especialista-nombre {
        font-weight: 600;
        color: #2c3e50;
    }
    
    .especialista-especialidad {
        color: #6c757d;
        font-size: 0.9rem;
    }
    
    .disponibilidad {
        color: #28a745;
        font-size: 0.85rem;
        margin-top: 0.3rem;
    }
    
    .btn-programar {
        background-color: #4e73df;
        color: white;
        padding: 0.5rem 1.2rem;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        font-size: 0.9rem;
        transition: background-color 0.3s;
    }
    
    .btn-programar:hover {
        background-color: #3a5ec0;
    }
    
    .tabla-sesiones {
        width: 100%;
        border-collapse: collapse;
    }
    
    .tabla-sesiones th, 
    .tabla-sesiones td {
        padding: 0.75rem;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .tabla-sesiones th {
        background-color: #f8f9fa;
        color: #495057;
    }
    
    .badge-completado {
        background-color: #d4edda;
        color: #155724;
        padding: 0.25rem 0.5rem;
        border-radius: 12px;
        font-size: 0.8rem;
    }
    
    .emergencia-card {
        background-color: #fff3cd;
        padding: 1.5rem;
        border-radius: 8px;
        text-align: center;
    }
    
    .emergencia-titulo {
        color: #856404;
        margin-bottom: 0.5rem;
    }
    
    .btn-emergencia {
        background-color: #dc3545;
        color: white;
        padding: 0.6rem 1.5rem;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 1rem;
    }
</style>
@endsection

@section('contenido')
<div class="terapias-container">
    <h1 class="titulo-principal">SerenIT</h1>
    
    <div class="breadcrumb">Dashboard > Terapias</div>
    
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