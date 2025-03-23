@extends('sidebar')

@section('title', 'Inicio')

@section('estilos_adicionales')
    <link href="{{ asset('css/estadoanimo.css') }}" rel="stylesheet">
@endsection

@section('contenido')

    <div class="info">
        <h1>BIENVENIDO</h1>
        <p>Estado de ánimo</p>
    </div>

@stop