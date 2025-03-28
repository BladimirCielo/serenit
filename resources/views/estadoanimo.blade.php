@extends('sidebar')

@section('title', 'Estado de ánimo')

@section('estilos_adicionales')
    <link href="{{ asset('css/estadoanimo.css') }}" rel="stylesheet">
@endsection

@section('contenido')

    <div class="container">
        <form action="#" method="POST">
            @csrf
            <div class="subcont registro-emociones">
                <h2>¿Cómo te sientes hoy?</h2>
                <div class="mood-options">
                    @foreach(["genial" => "😊", "bien" => "🙂", "neutral" => "😐", "decaido" => "😞"] as $estado => $icono)
                        <label class="mood-card {{ $estado }}">
                            <div class="icon-card-cont">
                                <span>{{ $icono }}</span>
                            </div>
                            <h3>{{ ucfirst($estado) }}</h3>
                            <p>{{ $estado === 'genial' ? 'Sentimiento positivo y enérgico' : ($estado === 'bien' ? 'En general me siento bien' : ($estado === 'neutral' ? 'Ni bien ni mal' : 'Sintiéndome mal el día de hoy')) }}</p>
                            <input type="radio" name="estado_animo" value="{{ $estado }}" style="display:none">
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="subcont note-section">
                <h3>Añade una nota sobre tu estado de ánimo</h3>
                <span>¿Qué tienes en mente?</span>
                <textarea name="nota_estado_animo" placeholder="Escribe aquí"></textarea>
            </div>

            <button type="submit" class="main-button">Guardar Estado de Ánimo</button>
        </form>

        <div class="subcont analysis-section">
            <h3>Tendencias semanales del ánimo</h3>
            <div class="analysis-card">
                <div class="icon-card-cont">
                        <span>📈</span>
                    </div>
                <div>
                    <h4>Análisis del ánimo</h4>
                    <p>Tu estado de ánimo ha mejorado durante la última semana</p>
                    <button class="main-button">Ver detalles</button>
                    <button class="second-button">Compartir</button>
                </div>
            </div>
        </div>

        <div class="subcont recommendations">
            <h3>Recomendaciones</h3>
            <ul>
                <li>
                    <div class="icon-cont">
                        <span>✍️</span>
                    </div>
                    <div class="info-cont">
                        <span>Meditación matutina</span>
                        <p>10 minutos de meditación guiada</p>
                    </div>
                </li>
                <li>
                    <div class="icon-cont">
                        <span>🚶</span>
                    </div>
                    <div class="info-cont">
                        <span>Paseo al atardecer</span>
                        <p>Expresa tus pensamientos por escrito</p>
                    </div>        
                </li>
                <li>
                    <div class="icon-cont">
                        <span>✍️</span>
                    </div>
                    <div class="info-cont">
                        <span>Ejercicio diario</span>
                        <p>Expresa tus pensamientos por escrito</p>
                    </div>        
                </li>
            </ul>
        </div>

    </div>

@stop