@extends('sidebar')

@section('title', 'Dashboard')

@section('estilos_adicionales')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <style>
        #inicio { background-color: rgb(223, 229, 255); }
    </style>
@endsection

@section('contenido')
<div class="container">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <span>Dashboard</span> &gt; <span>Análisis</span> &gt;
        <span class="active">Tendencias del estado de ánimo</span>
    </div>

    <!-- Tabs -->
    <div class="tabs">
        <button class="tab active">Semanalmente</button>
        <button class="tab">Mensualmente</button>
        <button class="tab">Trimestral</button>
    </div>

    <!-- Estadísticas -->
    <div class="stats">
        <div class="card">
            <h3>Promedio de ánimo</h3>
            <p class="value">7.8/10</p>
            <p class="desc">15% de mejora respecto a la semana pasada</p>
            <button class="btn">Detalles</button>
        </div>

        <div class="card">
            <h3>Horas pico</h3>
            <p class="value">10 AM - 2 PM</p>
            <p class="desc">Emociones más positivas registradas</p>
            <button class="btn">Ver patrón</button>
        </div>

        <div class="card">
            <h3>Consistencia</h3>
            <p class="value">85%</p>
            <p class="desc">Puntuación de estabilidad del estado de ánimo</p>
            <button class="btn">Análisis</button>
        </div>
    </div>

    <!-- Distribución emocional -->
    <h2 class="section-title">Distribución emocional</h2>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Emoción</th>
                    <th>Porcentaje</th>
                    <th>Tendencia</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Alegría</td>
                    <td>32%</td>
                    <td class="positive">↑ 5%</td>
                    <td>Más frecuente por las mañanas</td>
                </tr>
                <tr>
                    <td>Calma</td>
                    <td>28%</td>
                    <td class="positive">↑ 3%</td>
                    <td>Consistente durante todo el día</td>
                </tr>
                <tr>
                    <td>Neutral</td>
                    <td>25%</td>
                    <td class="positive">↑ 2%</td>
                    <td>Común por las tardes</td>
                </tr>
                <tr>
                    <td>Estrés</td>
                    <td>15%</td>
                    <td class="negative">↓ 6%</td>
                    <td>Tendencia decreciente</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Botones de acciones -->
    <div class="actions">
        <button class="btn primary">Exportar análisis</button>
        <button class="btn secondary">Compartir</button>
    </div>
</div>
@endsection
