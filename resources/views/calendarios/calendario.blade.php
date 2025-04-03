@extends('sidebar')

@section('title', 'Calendario')

@section('estilos_adicionales')
    <link href="{{ asset('css/calendario.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        
    </style>
@endsection

@section('contenido')

    <div class="container">
        
        <div class="header-main">
            <div class="header-title"  >
                <h2 style="font-weight:bold;margin:10px;"><?= $mespanish; ?> <small><?= $data['year']; ?></small></h2>
                <a class="btn-header" href="{{ asset('organizador') }}">Crear un evento</a>
            </div>
            
            <!-- Controles de periodo mensual -->
            <div class="col btn-periodo" style="">
                <a class="btn-header" href="{{ asset('index_month') }}/<?= $data['last']; ?>" style="margin:10px;">
                    <span>Anterior</span>
                </a>
                <a class="btn-header" href="{{ asset('index') }}">
                    <span>Mes actual</span>
                </a>
                <a class="btn-header" href="{{ asset('index_month') }}/<?= $data['next']; ?>" style="margin:10px;">
                    <span>Siguiente</span>
                </a>
            </div>
        </div>

        <hr>

      <div class="row">
        <div class="col header-col">Lunes</div>
        <div class="col header-col">Martes</div>
        <div class="col header-col">Miercoles</div>
        <div class="col header-col">Jueves</div>
        <div class="col header-col">Viernes</div>
        <div class="col header-col">Sabado</div>
        <div class="col header-col">Domingo</div>
      </div>
      <!-- inicio de semana -->
      @foreach ($data['calendar'] as $weekdata)
        <div class="row">
          <!-- ciclo de dia por semana -->
          @foreach  ($weekdata['datos'] as $dayweek)

          @if  ($dayweek['mes']==$mes)
            <div class="col box-day">
              {{ $dayweek['dia']  }}
              <!-- Carga y lista los eventos -->
               <!-- evento -->
              @foreach  ($dayweek['evento'] as $event) 
                  <a class="badge badge-primary" href="{{ asset('details') }}/{{ $event->id_evento }}">
                    {{ $event->titulo }}
                  </a>
              @endforeach
            </div>
          @else
          <div class="col box-dayoff">
          </div>
          @endif


          @endforeach
        </div>
      @endforeach

    </div> <!-- /container -->


@stop
