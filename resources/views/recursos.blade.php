@extends('sidebar')

@section('title', 'SerenIT - Recursos')

@section('estilos_adicionales')
    <link href="{{ asset('css/recursos.css') }}" rel="stylesheet">
@endsection

@section('contenido')
<div class="recursos-container">
    <h1 class="recursos-title">SerenIT</h1>
    <p class="recursos-subtitle">Vídeos y recursos para tu bienestar</p>
    
    <section class="featured-section">
        <h2 class="section-title"><ion-icon name="star"></ion-icon> Vídeos destacados</h2>
        
        <div class="videos-grid">
            @foreach($featuredVideos as $video)
            <div class="video-card">
                <div class="video-thumbnail" style="background-image: url('{{ asset($video['thumbnail']) }}')">
                    <div class="play-button">
                        <ion-icon name="play-circle"></ion-icon>
                    </div>
                    <div class="duration-badge">{{ $video['duration'] }} min</div>
                </div>
                <div class="video-info">
                    <h3>{{ $video['title'] }}</h3>
                    <p>{{ $video['description'] }}</p>
                    <div class="video-meta">
                        <span>{{ $video['views'] }} vistas</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    
    <div class="content-columns">
        <section class="playlists-section">
            <h2 class="section-title"><ion-icon name="list"></ion-icon> Video Playlists</h2>
            
            @foreach($playlists as $playlist)
            <div class="playlist-card">
                <div class="playlist-icon">
                    <ion-icon name="play-circle"></ion-icon>
                </div>
                <div class="playlist-info">
                    <h3>{{ $playlist['title'] }}</h3>
                    <p>{{ $playlist['videos_count'] }} vídeos • {{ $playlist['total_duration'] }} minutos</p>
                    <div class="progress-container">
                        <div class="progress-bar" style="width: {{ $playlist['progress'] }}%"></div>
                        <span>{{ $playlist['progress'] }}% completado</span>
                    </div>
                </div>
            </div>
            @endforeach
        </section>
        
        <section class="experts-section">
            <h2 class="section-title"><ion-icon name="people"></ion-icon> Charlas de expertos</h2>
            
            @foreach($expertTalks as $talk)
            <div class="expert-card">
                <div class="expert-photo" style="background-image: url('{{ asset($talk['photo']) }}')"></div>
                <div class="expert-info">
                    <h3>{{ $talk['title'] }}</h3>
                    <p class="expert-name">{{ $talk['expert'] }}</p>
                    <p class="expert-duration">{{ $talk['duration'] }} min</p>
                </div>
            </div>
            @endforeach
        </section>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // JavaScript específico para la vista Recursos SerenIT
    document.addEventListener('DOMContentLoaded', function() {
        // Activar tooltips para los videos
        const videoCards = document.querySelectorAll('.video-card');
        videoCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.querySelector('.play-button').style.opacity = '1';
            });
            card.addEventListener('mouseleave', function() {
                this.querySelector('.play-button').style.opacity = '0';
            });
            
            // Click en tarjeta de video
            this.addEventListener('click', function() {
                // Aquí puedes agregar lógica para reproducir el video
                console.log('Reproducir video: ' + this.querySelector('h3').textContent);
            });
        });
        
        // Mostrar más información al hacer hover en expertos
        const expertCards = document.querySelectorAll('.expert-card');
        expertCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'none';
            });
        });
    });
</script>
@endsection