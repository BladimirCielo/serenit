<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecursosController extends Controller
{
    public function recursos()
    {
        // Datos para los videos destacados
        $featuredVideos = [
            [
                'title' => '5 minutos de alivio de ansiedad',
                'description' => 'Método rápido para calma instantánea',
                'duration' => '5',
                'views' => '1.2M',
                'thumbnail' => 'videos/ansiedad-thumb.jpg'
            ],
            [
                'title' => 'Dormirme mejor esta noche',
                'description' => 'Consejos para mejores hábitos de sueño',
                'duration' => '8',
                'views' => '856K',
                'thumbnail' => 'videos/sueno-thumb.jpg'
            ],
            [
                'title' => 'Manejo del estrés',
                'description' => 'Técnicas profesionales explicadas',
                'duration' => '12',
                'views' => '943K',
                'thumbnail' => 'videos/estres-thumb.jpg'
            ]
        ];

        // Datos para las playlists
        $playlists = [
            [
                'title' => 'Conceptos básicos de la atención plena',
                'videos_count' => '8',
                'total_duration' => '45',
                'progress' => '25'
            ],
            [
                'title' => 'Manejo del estrés',
                'videos_count' => '6',
                'total_duration' => '30',
                'progress' => '65'
            ],
            [
                'title' => 'Rutina para dormir mejor',
                'videos_count' => '5',
                'total_duration' => '25',
                'progress' => '10'
            ]
        ];

        // Datos para charlas de expertos
        $expertTalks = [
            [
                'title' => 'Entendiendo la ansiedad',
                'expert' => 'Dr. Sarah Johnson',
                'duration' => '15',
                'photo' => 'experts/dr-johnson.jpg'
            ],
            [
                'title' => 'Creando resiliencia',
                'expert' => 'Dr. Michael Chan',
                'duration' => '20',
                'photo' => 'experts/dr-chan.jpg'
            ]
        ];

        return view('recursos', compact('featuredVideos', 'playlists', 'expertTalks'));
    }
}