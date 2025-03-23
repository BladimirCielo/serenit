@extends('sidebar')

@section('title', 'Inicio')

@section('estilos_adicionales')
    <link href="{{ asset('css/inicio.css?v=2') }}" rel="stylesheet">
@endsection

@section('contenido')

    <div class="info">
        <h1>DASHBOARD</h1>
    </div>

@stop