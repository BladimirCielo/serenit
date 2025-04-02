@extends('sidebar')

@section('title', 'SerenIT - Recursos')

@section('estilos_adicionales')
    <link href="{{ asset('css/recursos.css') }}" rel="stylesheet">
    <style>
        #recursos { background-color: rgb(223, 229, 255); }
    </style>
@endsection

@section('contenido')
<div class="recursos-container">
    <h1 class="recursos-title">SerenIT</h1>
    <p class="recursos-subtitle">Vídeos y recursos para tu bienestar</p>
    
    <section class="featured-section">
        <h2 class="section-title"><i class="fas fa-star"></i> Vídeos destacados</h2>
        
        <div class="videos-grid">
            <!-- Video de Relajación -->
            <div class="video-card" data-url="https://www.youtube.com/watch?v=9svic7ldL2w">
                <div class="media-container">
                    <img src="{{ asset('img/videos/relajacion.jpg') }}" alt="Video de Relajación" class="media-image" loading="lazy">
                    <div class="play-button">
                        <i class="fas fa-play-circle"></i>
                    </div>
                    <div class="duration-badge">5 min</div>
                </div>
                <div class="video-info">
                    <h3>Video de Relajación</h3>
                    <p>Ejercicios de respiración y relajación</p>
                    <div class="video-meta">
                        <span>100K vistas</span>
                    </div>
                </div>
            </div>
            
            <!-- Práctica de relajación -->
            <div class="video-card" data-url="https://www.youtube.com/watch?v=c6G_6OwmPjE">
                <div class="media-container">
                    <img src="{{ asset('img/videos/default.jpg') }}" alt="Práctica de relajación" class="media-image" loading="lazy">
                    <div class="play-button">
                        <i class="fas fa-play-circle"></i>
                    </div>
                    <div class="duration-badge">10 min</div>
                </div>
                <div class="video-info">
                    <h3>Práctica de relajación</h3>
                    <p>Video de práctica de relajación</p>
                    <div class="video-meta">
                        <span>75K vistas</span>
                    </div>
                </div>
            </div>
            
            <!-- Video sobre Ansiedad -->
            <div class="video-card" data-url="https://www.youtube.com/watch?v=iEdv9X8JbsA">
                <div class="media-container">
                    <img src="{{ asset('img/videos/ansiedad.jpg') }}" alt="Video sobre Ansiedad" class="media-image" loading="lazy">
                    <div class="play-button">
                        <i class="fas fa-play-circle"></i>
                    </div>
                    <div class="duration-badge">8 min</div>
                </div>
                <div class="video-info">
                    <h3>Información sobre Ansiedad</h3>
                    <p>Video educativo sobre manejo de ansiedad</p>
                    <div class="video-meta">
                        <span>50K vistas</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="content-columns">
        <section class="playlists-section">
            <h2 class="section-title"><i class="fas fa-list"></i> Video Playlists</h2>
            
            <!-- Lista de autoayuda -->
            <div class="playlist-container" data-url="https://www.youtube.com/playlist?list=PLOqoLXu71sASfy2UPXLnY5Ilx1ne2bKxq">
                <div class="playlist-icon-container">
                    <img src="{{ asset('img/experts/Autoayuda.jpg') }}" alt="Autoayuda" class="playlist-image">
                </div>
                <div class="playlist-info">
                    <h3 class="playlist-title">Lista de Autoayuda</h3>
                    <p class="playlist-meta">5 vídeos • 60 minutos</p>
                </div>
            </div>
            
            <!-- Superación personal -->
            <div class="playlist-container" data-url="https://www.youtube.com/playlist?list=PLSU4LcAeYoJchSesJfbPgDAahOymGb1wG">
                <div class="playlist-icon-container">
                    <img src="{{ asset('img/experts/superacion.jpg') }}" alt="Superación personal" class="playlist-image">
                </div>
                <div class="playlist-info">
                    <h3 class="playlist-title">Superación Personal</h3>
                    <p class="playlist-meta">8 vídeos • 90 minutos</p>
                </div>
            </div>
        </section>
        
        <section class="experts-section">
            <h2 class="section-title"><i class="fas fa-users"></i> Recursos adicionales</h2>
            
            <!-- Guía de Autoayuda -->
            <div class="expert-card" data-url="https://consaludmental.org/centro-documentacion/guias-autoayuda-depresion-ansiedad/">
                <div class="expert-photo-container">
                    <img src="{{ asset('img/experts/guia.jpg') }}" alt="Guía de Autoayuda" class="expert-photo">
                </div>
                <div class="expert-info">
                    <h3>Guía de Autoayuda</h3>
                    <p class="expert-name">Guía para mejorar la salud mental</p>
                </div>
            </div>
            
            <!-- Artículo sobre Ansiedad -->
            <div class="expert-card" data-url="https://www.who.int/es/news-room/fact-sheets/detail/anxiety-disorders">
                <div class="expert-photo-container">
                    <img src="{{ asset('img/experts/ansiedad.jpg') }}" alt="Artículo sobre Ansiedad" class="expert-photo">
                </div>
                <div class="expert-info">
                    <h3>Artículo sobre Ansiedad</h3>
                    <p class="expert-name">Información sobre cómo manejar la ansiedad</p>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function handleMediaClick(url, event) {
            if (!url || url === '#') {
                console.warn('URL no válida o vacía');
                return false;
            }
            
            try {
                // Manejo de YouTube
                if (url.includes('youtube.com') || url.includes('youtu.be')) {
                    let videoId = url.split('v=')[1];
                    if (!videoId) videoId = url.split('youtu.be/')[1];
                    if (videoId) {
                        videoId = videoId.split(/[?&]/)[0];
                        window.open(`https://www.youtube.com/embed/${videoId}?autoplay=1`, '_blank', 'noopener,noreferrer');
                        return false;
                    }
                }
                
                // Para playlists de YouTube
                if (url.includes('playlist?list=')) {
                    window.open(url, '_blank', 'noopener,noreferrer');
                    return false;
                }
                
                // Para otros enlaces
                window.open(url, '_blank', 'noopener,noreferrer');
                return false;
                
            } catch (e) {
                console.error('Error al abrir el enlace:', e);
                alert('No se pudo abrir el recurso. Por favor intente más tarde.');
                return false;
            }
        }

        // Configurar eventos para todas las tarjetas
        document.querySelectorAll('.video-card, .expert-card, .playlist-container').forEach(card => {
            // Efectos hover
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px)';
                this.style.boxShadow = '0 5px 15px rgba(0,0,0,0.1)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'none';
                this.style.boxShadow = '0 2px 5px rgba(0,0,0,0.1)';
            });
            
            // Click para abrir recurso
            card.addEventListener('click', function(e) {
                if (e.target.closest('a, button')) return;
                handleMediaClick(this.getAttribute('data-url'), e);
            });
        });
    });
</script>
@endsection