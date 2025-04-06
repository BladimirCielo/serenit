@extends('sidebar')

@section('title', 'Dashboard')

@section('estilos_adicionales')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <!-- <link href="{{ asset('css/organizacion.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('css/calendario.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('css/moodtrend.css') }}" rel="stylesheet"> -->
    <style>
        #inicio { 
            background-color: rgb(223, 229, 255); 
        }

        .stats .card {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
    </style>
    
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('contenido')

    <!-- Card-Section: Tareas Próximas -->
    <div class="recommendations">
        <h2 class="sesiones-previas-header">Tareas próximas</h2>
      <div class="message">
        @if (Session::has('mensaje'))
            <div class="alert alert-dismissible alert-secondary">
                <button type="button" class="btn-close boton" data-bs-dismiss="alert"></button>
                <strong>{{ Session::get('mensaje') }}</strong>
            </div>
        @endif
      </div>
      <ul>
            @foreach($registrostasks as $task)
            <li>
                <div class="icon-cont">
                    <svg class="iconos-nav"  version="1.0" xmlns="http://www.w3.org/2000/svg"  width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"  preserveAspectRatio="xMidYMid meet">
                      <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" stroke="none"> <path d="M980 5045 l0 -75 -215 0 -215 0 0 -225 0 -225 80 0 80 0 0 150 0 150 135 0 135 0 0 -75 0 -75 230 0 230 0 0 75 0 75 220 0 220 0 0 -75 0 -75 230 0 230 0 0 75 0 75 220 0 220 0 0 -75 0 -75 230 0 230 0 0 75 0 75 220 0 220 0 0 -75 0 -75 230 0 230 0 0 75 0 75 135 0 135 0 0 -2335 0 -2335 -150 0 -150 0 0 -75 0 -75 230 0 230 0 0 2485 0 2485 -215 0 -215 0 0 75 0 75 -230 0 -230 0 0 -75 0 -75 -220 0 -220 0 0 75 0 75 -230 0 -230 0 0 -75 0 -75 -220 0 -220 0 0 75 0 75 -230 0 -230 0 0 -75 0 -75 -220 0 -220 0 0 75 0 75 -230 0 -230 0 0 -75z m300 -150 l0 -75 -70 0 -70 0 0 75 0 75 70 0 70 0 0 -75z m900 0 l0 -75 -70 0 -70 0 0 75 0 75 70 0 70 0 0 -75z m900 0 l0 -75 -70 0 -70 0 0 75 0 75 70 0 70 0 0 -75z m900 0 l0 -75 -70 0 -70 0 0 75 0 75 70 0 70 0 0 -75z"/> <path d="M3810 4445 l0 -75 80 0 80 0 0 75 0 75 -80 0 -80 0 0 -75z"/> <path d="M4110 4445 l0 -75 80 0 80 0 0 75 0 75 -80 0 -80 0 0 -75z"/> <path d="M550 2185 l0 -2185 1710 0 1710 0 0 75 0 75 -1630 0 -1630 0 0 2110 0 2110 -80 0 -80 0 0 -2185z"/> <path d="M3557 3972 l-107 -107 0 93 0 92 -80 0 -80 0 0 -350 0 -350 80 0 80 0 0 100 0 101 117 -121 116 -121 59 58 58 57 -78 81 c-42 44 -104 108 -137 143 l-60 62 128 128 127 127 -58 58 -57 57 -108 -108z"/> <path d="M1350 3970 l0 -80 75 0 75 0 2 -272 3 -273 78 -3 77 -3 0 276 0 275 80 0 80 0 0 80 0 80 -235 0 -235 0 0 -80z"/> <path d="M2002 3733 c-66 -175 -123 -325 -126 -333 -5 -12 11 -22 66 -42 39 -15 74 -25 78 -23 4 2 19 38 35 80 l27 75 108 0 108 0 27 -72 c15 -40 31 -76 34 -80 5 -6 132 34 149 47 1 1 -53 150 -122 331 l-124 329 -69 3 -70 3 -121
                      -318z"/> <path d="M2781 4024 c-38 -19 -62 -40 -83 -73 -26 -41 -29 -53 -26 -113 5 -100 33 -130 178 -190 127 -53 145 -66 135 -97 -8 -28 -40 -43 -84 -43 -56 1 -92 19 -139 69 l-43 47 -54 -54 c-30 -30 -55 -58 -55 -63 0 -5 25 -33 55 -62 169 -166 463 -108 483 94 9 92 -46 180 -132 216 -177 73 -186 77 -186 96 0 39 76 52 133 23 18 -9 45 -27 60 -40 16 -13 34 -24 40 -24 12 1 97 101 97 114 0 15 -69 68 -120 93 -40 19 -75 27 -130 30 -66 4 -81 1 -129 -23z"/> <path d="M1540 2885 l-105 -105 -52 52 -53 53 -57 -58 -58 -57 105 -105 c58 -58 109 -105 115 -105 6 0 82 72 170 160 l160 160 -55 55 c-30 30 -57 55 -60 55 -3 0 -52 -47 -110 -105z"/> <path d="M1860 2650 l0 -80 995 0 995 0 0 80 0 80 -995 0 -995 0 0 -80z"/> <path d="M1540 2285 l-105 -105 -52 52 -53 53 -57 -58 -58 -57 105 -105 c58 -58 109 -105 115 -105 6 0 82 72 170 160 l160 160 -55 55 c-30 30 -57 55 -60 55 -3 0 -52 -47 -110 -105z"/> <path d="M1860 2050 l0 -80 995 0 995 0 0 80 0 80 -995 0 -995 0 0 -80z"/> <path d="M1540 1685 l-105 -105 -52 52 -53 53 -57 -58 -58 -57 105 -105 c58 -58 109 -105 115 -105 6 0 82 72 170 160 l160 160 -55 55 c-30 30 -57 55 -60 55 -3 0 -52 -47 -110 -105z"/> <path d="M1860 1450 l0 -80 995 0 995 0 0 80 0 80 -995 0 -995 0 0 -80z"/> <path d="M1540 1085 l-105 -105 -52 52 -53 53 -57 -58 -58 -57 105 -105 c58 -58 109 -105 115 -105 6 0 82 72 170 160 l160 160 -55 55 c-30 30 -57 55 -60 55 -3 0 -52 -47 -110 -105z"/> <path d="M1860 850 l0 -80 995 0 995 0 0 80 0 80 -995 0 -995 0 0 -80z"/> </g>
                    </svg>
                </div>
                <div class="info-cont">
                    <div class="info">
                        <span>{{$task->titulo}}</span>
                        <p>{{$task->fecha}}</p>
                    </div>
                    <div class="actions">
                      <a href="{{ route('eventedit', ['id_evento' => $task->id_evento]) }}">
                        <svg class="actions-icon" version="1.0" xmlns="http://www.w3.org/2000/svg"  width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"  preserveAspectRatio="xMidYMid meet">
                          <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" stroke="none"> <path d="M3655 4663 c-89 -19 -197 -63 -277 -115 -46 -29 -430 -406 -1390 -1366 -730 -729 -1332 -1338 -1338 -1352 -14 -34 -170 -1131 -170 -1195 0 -95 62 -155 160 -155 88 0 1163 156 1196 173 16 9 624 611 1351 1339 955 956 1332
                          1340 1361 1386 55 85 97 190 117 291 26 124 17 307 -20 421 -94 297 -330 513 -627 574 -96 20 -269 20 -363 -1z m310 -328 c184 -48 333 -200 375 -384 21 -91 -4 -304 -39 -325 -4 -3 -159 147 -345 333 -378 378 -356 345 -244 375 71 19 180 20 253 1z m-480 -375 l120 -120 -1163 -1163 -1162 -1162 -122 123 -123 122 1160 1160 c638 638 1162 1160 1165 1160 3 0 59 -54 125 -120z m480 -480 l120 -120 -1163 -1163 -1162 -1162 -122 123 -123 122 1160 1160 c638 638 1162 1160 1165 1160 3 0 59 -54 125 -120z m-2573 -2561 c-10 -10 -541 -83 -548 -76 -6 5 61 514 72 546 3 10 88 -68 244 -224 132 -132 236 -242 232 -246z"/> </g>
                        </svg>
                      </a>
                      <a href="{{ route('eliminarEvento', ['id_evento' => $task->id_evento]) }}">
                        <svg class="actions-icon" version="1.0" xmlns="http://www.w3.org/2000/svg"  width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"  preserveAspectRatio="xMidYMid meet">
                          <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" stroke="none"> <path d="M1785 5111 c-31 -13 -64 -54 -75 -92 -6 -19 -10 -116 -10 -216 l0 -183 860 0 860 0 0 183 c0 100 -5 198 -10 218 -5 19 -24 48 -41 65 l-30 29 -767 2 c-422 1 -776 -2 -787 -6z"/> <path d="M730 4323 c-99 -34 -177 -115 -206 -211 -10 -32 -14 -105 -14 -244 l0 -198 2051 0 2050 0 -3 218 c-3 207 -4 219 -27 267 -32 63 -92 124 -156 155
                          l-50 25 -1800 2 c-1617 2 -1805 1 -1845 -14z"/> <path d="M840 3373 c0 -10 49 -737 110 -1615 119 -1748 108 -1635 177 -1699 68 -64 -42 -59 1437 -57 l1344 3 44 30 c49 35 85 92 93 150 3 22 55 722 115 1555 60 833 112 1545 116 1583 l6 67 -1721 0 c-1632 0 -1721 -1 -1721 -17z m1259 -468 c16 -8 40 -28 55 -46 l26 -31 -2 -1063 -3 -1063 -25 -27 c-54 -58 -108 -69 -170 -34 -75 43 -70 -45 -70 1129 0 1172 -5 1086 69 1129 43 24 81 27 120 6z m1039 -5 c18 -11 41 -34 52 -52 20 -32 20 -53 20 -1076 0 -1136 3 -1075 -56 -1121 -62 -49 -154 -31 -197 38 l-22 36 0 1045 0 1045 23 36 c40 65 118 87 180 49z"/> </g>
                        </svg>
                      </a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

    <!-- Card-Section: Análisis de estádo de ánimo -->
    <div id="general" class="tab-content active">
        <h2 class="sesiones-previas-header">Tus estado de ánimo</h2>
        <div class="d-flex justify-content-center">
            <div class="chart-container pie">
                {!! $generalchart->renderHtml() !!}
            </div>
        </div>
    </div>

    <div class="sesiones-previas-section">
        <h2 class="sesiones-previas-header">Tus sesiones previas</h2>
        
        @if(isset($sesiones_previas) && count($sesiones_previas) > 0)
        <div class="table-responsive">
            <table class="sesiones-table">
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
        </div>
        @else
        <div class="sin-sesiones">
            <p>No tienes sesiones previas registradas.</p>
        </div>
        @endif
    </div>

    <script>
        {!! $generalchart->renderChartJsLibrary() !!}
        {!! $generalchart->renderJs() !!}
    </script>
@endsection
