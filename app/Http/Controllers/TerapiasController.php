<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terapeuta;

class TerapiasController extends Controller
{
    public function terapia()
{
    $terapeutasDB = Terapeuta::all();
    
    // Debug esencial
    if($terapeutasDB->isEmpty()) {
        logger()->warning('No hay terapeutas registrados en la base de datos');
    }
    
    $especialistas = $terapeutasDB->map(function($terapeuta) {
        return [
            'id' => $terapeuta->id,
            'nombre' => $terapeuta->nombre_terapeuta,
            'especialidad' => $terapeuta->especialidad,
            'disponibilidad' => $this->getDisponibilidadAleatoria()
        ];
    })->toArray();
    
    // Asegúrate de que esta variable esté definida
    $sesiones_previas = [
        [
            'terapeuta' => 'Dr. Juan Pérez',
            'fecha' => now()->subDays(3)->format('M d, Y'),
            'duracion' => '45min',
            'estado' => 'Completado'
        ],
        [
            'terapeuta' => 'Dra. Ana Gómez',
            'fecha' => now()->subDays(7)->format('M d, Y'),
            'duracion' => '30min',
            'estado' => 'Completado'
        ],
        [
            'terapeuta' => 'Lic. Roberto Díaz',
            'fecha' => now()->subWeeks(2)->format('M d, Y'),
            'duracion' => '60min',
            'estado' => 'Completado'
        ]
    ];
    
    // Verifica que se estén pasando ambas variables
    return view('terapias', [
        'breadcrumb' => 'Dashboard > Terapias',
        'especialistas' => $especialistas,
        'sesiones_previas' => $sesiones_previas // ¡Esta línea es crucial!
    ]);
}
    
    // Nuevo método para mostrar el formulario de creación
    public function crearCita(Request $request)
{
    $terapeutas = Terapeuta::all();
    
    if($terapeutas->isEmpty()) {
        return redirect()->route('terapias')->with('error', 'No hay terapeutas disponibles');
    }

    $terapeuta_seleccionado = null;
    if ($request->has('terapeuta_id')) {
        $terapeuta_seleccionado = Terapeuta::find($request->terapeuta_id);
    }

    return view('crearcita', [
        'terapeutas' => $terapeutas,
        'terapeuta_seleccionado' => $terapeuta_seleccionado,
        'breadcrumb' => 'Dashboard > Terapias > Programar Cita'
    ]);
}
    
    // Nuevo método para procesar el formulario
    public function guardarCita(Request $request)
    {
        $validated = $request->validate([
            'terapeuta_id' => 'required|exists:terapeutas,id',
            'fecha' => 'required|date|after:now',
            'duracion' => 'required|integer|min:15|max:120',
            'notas' => 'nullable|string|max:500'
        ]);
        
        // Aquí iría la lógica para guardar la cita en la base de datos
        // Por ejemplo:
        // Cita::create($validated);
        
        return redirect()->route('terapias')->with('success', 'Cita programada exitosamente!');
    }
    
    private function getDisponibilidadAleatoria()
    {
        // Tu método actual...
    }
    public function create(Terapeuta $terapeuta)
{
    return view('citas.crearcita', compact('terapeuta'));
}
    
}