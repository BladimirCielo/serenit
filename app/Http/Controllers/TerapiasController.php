<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terapeuta;
use App\Models\CitaTerapia;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TerapiasController extends Controller
{
    public function terapia()
    {
        $terapeutasDB = Terapeuta::all();
        
        if($terapeutasDB->isEmpty()) {
            logger()->warning('No hay terapeutas registrados en la base de datos');
        }
        
        $especialistas = $terapeutasDB->map(function($terapeuta) {
            return [
                'id' => $terapeuta->id_terapeuta,
                'nombre' => $terapeuta->nombre_terapeuta,
                'especialidad' => $terapeuta->especialidad,
                'disponibilidad' => $this->getDisponibilidadAleatoria()
            ];
        })->toArray();
        
        $sesiones_previas = CitaTerapia::with('terapeuta')
            ->orderBy('fecha_cita', 'desc')
            ->limit(3)
            ->get()
            ->map(function($cita) {
                return [
                    'terapeuta' => $cita->terapeuta->nombre_terapeuta,
                    'fecha' => Carbon::parse($cita->fecha_cita)->format('M d, Y'),
                    'duracion' => $cita->duracion.'min',
                    'estado' => $cita->estado ? 'Completado' : 'Pendiente'
                ];
            })->toArray();
        
        return view('terapias', [
            'breadcrumb' => 'Dashboard > Terapias',
            'especialistas' => $especialistas,
            'sesiones_previas' => $sesiones_previas
        ]);
    }
    
    public function crearCita(Request $request, $terapeutaId = null)
    {
        $terapeutas = Terapeuta::all();
        
        if($terapeutas->isEmpty()) {
            return redirect()->route('terapias')->with('error', 'No hay terapeutas disponibles');
        }

        $terapeuta_seleccionado = null;
        
        if ($terapeutaId) {
            $terapeuta_seleccionado = Terapeuta::findOrFail($terapeutaId);
        } elseif ($request->has('terapeuta_id')) {
            $terapeuta_seleccionado = Terapeuta::find($request->terapeuta_id);
        }

        return view('crearcita', [
            'terapeutas' => $terapeutas,
            'terapeuta_seleccionado' => $terapeuta_seleccionado,
            'breadcrumb' => 'Dashboard > Terapias > Programar Cita'
        ]);
    }
    
    public function guardarCita(Request $request)
{
    if (!auth()->check()) {
        logger()->error('Usuario no autenticado', ['user_ip' => $request->ip()]);
        return redirect()->route('login')->with('error', 'La sesión ha expirado. Inicie sesión nuevamente.');
    }

    $validated = $request->validate([
        'id_terapeuta' => 'required|exists:terapeutas,id_terapeuta',
        'fecha_cita' => 'required|date|after:now',
        'duracion' => 'required|in:30,45,60,90',
        'notas' => 'nullable|string|max:500'
    ]);

    try {
        $cita = new CitaTerapia();
        $cita->id_usuario = auth()->id();
        $cita->id_terapeuta = $validated['id_terapeuta'];
        $cita->fecha_cita = $validated['fecha_cita'];
        $cita->duracion = $validated['duracion'];
        $cita->notas = $validated['notas'];
        $cita->estado = 1;
        $cita->save();

        return redirect()->route('terapias')
               ->with('success', 'Cita creada exitosamente');

    } catch (\Exception $e) {
        logger()->error('Error al guardar cita', [
            'error' => $e->getMessage(),
            'user' => auth()->id(),
            'data' => $validated
        ]);
        return back()->with('error', 'Error al guardar: '.$e->getMessage());
    }
}
    
    private function getDisponibilidadAleatoria()
    {
        $disponibilidades = [
            'Disponibilidad inmediata',
            'Disponible en 1-3 días',
            'Disponible la próxima semana',
            'Horarios limitados'
        ];
        
        return $disponibilidades[array_rand($disponibilidades)];
    }
}