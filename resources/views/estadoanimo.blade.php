@extends('sidebar')

@section('title', 'Estado de ánimo')

@section('estilos_adicionales')
    <link href="{{ asset('css/estadoanimo.css') }}" rel="stylesheet">
@endsection

@section('contenido')

    <div class="container">
        <div class="subcont registro-emociones">
            <h2>¿Cómo te sientes hoy?</h2>
            <div class="mood-options">
                <div class="mood-card genial">
                    <div class="icon-card-cont">
                        <span>😊</span>
                    </div>
                    <h3>Genial</h3>
                    <p>Sentimiento positivo y enérgico</p>
                </div>
                <div class="mood-card bien">
                    <div class="icon-card-cont">
                        <span>🙂</span>
                    </div>
                    <h3>Bien</h3>
                    <p>En general me siento bien</p>
                </div>
                    <div class="mood-card neutral">
                <div class="icon-card-cont">
                        <span>😐</span>
                    </div>
                    <h3>Neutral</h3>
                    <p>Ni bien ni mal</p>
                </div>
                <div class="mood-card decaido">
                    <div class="icon-card-cont">
                        <span>😞</span>
                    </div>
                    <h3>Decaído</h3>
                    <p>Sintiéndome mal el día de hoy</p>
                </div>
            </div>
        </div>

        <div class="subcont note-section">
            <h3>Añade una nota sobre tu estado de ánimo</h3>
            <span>¿Qué tienes en mente?</span>
            <textarea placeholder="Escribe aquí"></textarea>
        </div>

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