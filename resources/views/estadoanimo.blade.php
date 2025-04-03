@extends('sidebar')

@section('title', 'Estado de ánimo')

@section('estilos_adicionales')
    <link href="{{ asset('css/estadoanimo.css') }}" rel="stylesheet">
@endsection

@section('contenido')

    <div class="container">
        <form method="POST" action="{{ route('registrarEstadoAnimo') }}" enctype ="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="fecha_registro" value="{{ date('Y-m-d') }}">

            <div class="subcont registro-emociones">
                <h2>¿Cómo te sientes hoy?</h2>
                <div class="mood-options">
                    @foreach($tiposEstados as $tipo)
                        <label class="mood-card selected">
                            <input type="radio" name="id_tipo_estado_animo" value="{{ $tipo->id_tipo_estado_animo }}" required hidden>
                            <div class="icon-card-cont">😊</div> 
                            <h3>{{ $tipo->nombre_tipo }}</h3>
                            <p>{{ $tipo->descripcion }}</p>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="subcont note-section">
                <h3>Añade una nota sobre tu estado de ánimo</h3>
                <textarea name="nota" placeholder="Escribe aquí"></textarea>
            </div>

            <button type="submit" class="main-button">Guardar estado de ánimo</button>
        </form>

        <div class="subcont analysis-section">
            <!-- <h3>Tendencias semanales del ánimo</h3> -->
            <div class="analysis-card">
                <div class="icon-card-cont">
                        <span>📈</span>
                    </div>
                <div>
                    <h4>Análisis del ánimo</h4>
                    <p>Obten un análisis de los registros de tu estado de ánimo semanal y mensual.</p>
                    <a id="analisis" href="{{ route('moodTrend') }}"><button class="main-button">Ver detalles</button></a>
                </div>
            </div>
        </div>

        




    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const moodCards = document.querySelectorAll(".mood-card");

            moodCards.forEach(card => {
                card.addEventListener("click", function () {
                    // Remueve la clase 'selected' de todas las cards
                    moodCards.forEach(c => c.classList.remove("selected"));

                    // Agrega la clase 'selected' a la card clickeada
                    this.classList.add("selected");

                    // Asigna el ID del estado de ánimo seleccionado a un input oculto
                    document.getElementById("selectedMood").value = this.dataset.id;
                });
            });
        });

    </script>

@stop