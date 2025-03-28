<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recurso;
use Illuminate\Support\Str;

class RecursosController extends Controller
{
    public function recursos()
{
    // Obtener todos los recursos válidos (con enlace)
    $recursos = Recurso::whereNotNull('enlace_recurso')
                ->where('enlace_recurso', '!=', '')
                ->get();

    // 1. Vídeos destacados (tipo_recurso = 0)
    $featuredVideos = $recursos->where('tipo_recurso', 0)
        ->take(3)
        ->map(function($video) {
            return [
                'title'         => $video->nombre_recurso ?? 'Video sin título',
                'description'   => $video->descripcion_recurso ?? 'Descripción no disponible',
                'duration'      => $this->extraerDuracion($video->descripcion_recurso),
                'views'         => $this->extraerVistas($video->descripcion_recurso),
                'thumbnail'     => $this->asignarImagen($video, 'videos'),
                'url'           => $this->validarUrl($video->enlace_recurso)
            ];
        })
        ->values()
        ->toArray();

    // 2. Vídeos adicionales (empieza desde el cuarto registro)
    $videosAdicionales = $recursos->where('tipo_recurso', 0) // Filtrar solo vídeos
        ->skip(3) // Empieza desde el cuarto registro (omitimos los primeros 3)
        ->take(3) // Tomamos otros 3 videos
        ->map(function($video) {
            return [
                'title'         => $video->nombre_recurso ?? 'Video sin título',
                'description'   => $video->descripcion_recurso ?? 'Descripción no disponible',
                'duration'      => $this->extraerDuracion($video->descripcion_recurso),
                'views'         => $this->extraerVistas($video->descripcion_recurso),
                'thumbnail'     => $this->asignarImagen($video, 'videos'),
                'url'           => $this->validarUrl($video->enlace_recurso)
            ];
        })
        ->values()
        ->toArray();

    // 3. Playlists (pueden ser estáticas o dinámicas)
    $playlists = [
        [
            'title'         => 'Conceptos básicos de la atención plena',
            'videos_count'  => '8',
            'total_duration'=> '45',
            'progress'      => '25'
        ],
        [
            'title'         => 'Manejo del estrés',
            'videos_count'  => '6',
            'total_duration'=> '30',
            'progress'      => '65'
        ]
    ];

    // 4. Charlas de expertos (tipo_recurso = 1)
    $expertTalks = $recursos->where('tipo_recurso', 1)
        ->take(2)
        ->map(function($charla) {
            return [
                'title'     => $charla->nombre_recurso ?? 'Recurso sin título',
                'expert'    => $this->extraerExperto($charla->descripcion_recurso),
                'duration'  => $this->extraerDuracion($charla->descripcion_recurso),
                'photo'     => $this->asignarImagen($charla, 'experts'),
                'url'       => $this->validarUrl($charla->enlace_recurso)
            ];
        })
        ->values()
        ->toArray();

    return view('recursos', [
        'featuredVideos' => $featuredVideos,
        'videosAdicionales' => $videosAdicionales, // Pasando la variable a la vista
        'playlists' => $playlists,
        'expertTalks' => $expertTalks,
        'recursos' => $recursos // Asegúrate de pasar la variable $recursos
    ]);
}
    // --- Métodos auxiliares mejorados ---
    
    private function extraerDuracion($descripcion) {
        if (empty($descripcion)) return '5';
        
        preg_match('/(\d+)\s?min/i', $descripcion, $matches);
        return $matches[1] ?? '5'; // Valor por defecto
    }

    private function extraerVistas($descripcion) {
        if (empty($descripcion)) return '100K';
        
        preg_match('/([\d.]+[MK]?)\s?vistas?/i', $descripcion, $matches);
        return $matches[1] ?? '100K'; // Valor por defecto
    }

    private function extraerExperto($descripcion) {
        if (empty($descripcion)) return 'Experto Anónimo';
        
        preg_match('/Dr\.?\s([A-Za-z\s]+)/i', $descripcion, $matches);
        return isset($matches[1]) ? 'Dr. ' . $matches[1] : 'Experto Anónimo';
    }

    private function asignarImagen($recurso, $tipo)
{
    // Primero verificar si el recurso ya tiene una imagen asignada
    if (!empty($recurso->imagen) && file_exists(public_path($recurso->imagen))) {
        return $recurso->imagen;
    }

    // Lógica para asignar imágenes por defecto según el tipo
    $slug = Str::slug($recurso->nombre_recurso);
    $defaultImages = [
        'videos' => [
            'ansiedad' => 'ansiedad',
            'estrés|estres' => 'estres',
            'relajación|relajacion' => 'relajacion',
            'dormir|sueno|sueño' => 'sueno',
            'default' => 'default' // Aquí estamos usando el nombre de la imagen default.jpg
        ],
        'experts' => [
            'ansiedad' => 'dr-johnson',
            'resiliencia' => 'dr-chan',
            'default' => 'default'
        ]
    ];

    // Verifica si hay alguna palabra clave que coincida con el nombre del recurso
    foreach ($defaultImages[$tipo] as $keywords => $image) {
        if (preg_match("/$keywords/i", $recurso->nombre_recurso)) {
            return "img/$tipo/$image.jpg"; // Devuelve la ruta relativa de la imagen
        }
    }

    // Imagen por defecto en caso de no encontrar coincidencias
    return "img/$tipo/default.jpg"; // Usamos la imagen 'default.jpg'
}

    private function validarUrl($url) {
        if (empty($url)) {
            return '#';
        }

        // Asegurar que la URL tenga el protocolo http/https
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            return 'https://' . $url;
        }

        return $url;
    }
}