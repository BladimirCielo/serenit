<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TerapiasController extends Controller
{
    public function terapia()
    {
        return view('terapias', [
            'usuario' => 'Jane Cooper',
            'breadcrumb' => 'Dashboard > Terapias',
            'especialistas' => [
                [
                    'nombre' => 'Dr. Sarah Johnson',
                    'especialidad' => 'Psicólogo Clínico',
                    'disponibilidad' => 'Disponible ahora'
                ],
                [
                    'nombre' => 'Dr. Michael Chen', 
                    'especialidad' => 'Terapeuta',
                    'disponibilidad' => 'Disponible en 30min'
                ]
            ],
            'sesiones_previas' => [
                [
                    'terapeuta' => 'Dr. Sarah Johnson',
                    'fecha' => 'Ene 19, 2024',
                    'duracion' => '45min',
                    'estado' => 'Completado'
                ],
                [
                    'terapeuta' => 'Dr. Michael Chen',
                    'fecha' => 'Ene 19, 2024',
                    'duracion' => '30min',
                    'estado' => 'Completado'
                ]
            ]
        ]);
    }
}