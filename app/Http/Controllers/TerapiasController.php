<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terapeuta;
use App\Models\CitaTerapia;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class TerapiasController extends Controller
{
    public function terapia()
    {
        if (!Session::has('sesionidu')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión');
        }

        $terapeutas = Terapeuta::where('disponible', true)->get();
        
        $especialistas = $terapeutas->map(function($terapeuta) {
            return [
                'id' => $terapeuta->id_terapeuta,
                'nombre' => $terapeuta->nombre_terapeuta,
                'especialidad' => $terapeuta->especialidad,
                'disponibilidad' => $this->getDisponibilidadAleatoria()
            ];
        })->toArray();

        $sesiones_previas = CitaTerapia::with('terapeuta')
            ->where('id_usuario', Session::get('sesionidu'))
            ->orderBy('fecha_cita', 'desc')
            ->limit(3)
            ->get()
            ->map(function($cita) {
                return [
                    'terapeuta' => $cita->terapeuta->nombre_terapeuta ?? 'Terapeuta no disponible',
                    'fecha' => Carbon::parse($cita->fecha_cita)->format('d/m/Y H:i'),
                    'duracion' => $cita->duracion.' min',
                    'estado' => $cita->estado ? 'Completado' : 'Pendiente'
                ];
            })
            ->toArray();

        return view('terapias', [
            'breadcrumb' => 'Dashboard > Terapias',
            'especialistas' => $especialistas,
            'sesiones_previas' => $sesiones_previas,
            'nombre_usuario' => Session::get('sesionname')
        ]);
    }

    public function crearCita(Request $request, $terapeutaId = null)
{
    if (!Session::has('sesionidu')) {
        return redirect()->route('login')->with('error', 'Debes iniciar sesión');
    }

    $terapeutas = Terapeuta::where('disponible', true)->get();
    
    if ($terapeutas->isEmpty()) {
        return view('crearcita', [
            'terapeutas' => [],
            'terapeuta_seleccionado' => null,
            'breadcrumb' => 'Dashboard > Terapias > Programar Cita',
            'error' => 'No hay terapeutas disponibles en este momento. Por favor, intenta más tarde.'
        ]);
    }

    $terapeuta_seleccionado = $terapeutaId 
        ? Terapeuta::find($terapeutaId)
        : ($request->has('terapeuta_id') ? Terapeuta::find($request->terapeuta_id) : null);

    return view('crearcita', [
        'terapeutas' => $terapeutas,
        'terapeuta_seleccionado' => $terapeuta_seleccionado,
        'breadcrumb' => 'Dashboard > Terapias > Programar Cita'
    ]);
}

public function guardarCita(Request $request)
{
    if (!Session::has('sesionidu')) {
        return redirect()->route('login')->with('error', 'Sesión expirada');
    }

    $validated = $request->validate([
        'id_terapeuta' => 'required|exists:terapeutas,id_terapeuta',
        'fecha_cita' => [
            'required',
            'date',
            'after_or_equal:now',
            function ($attribute, $value, $fail) {
                $selectedDate = Carbon::parse($value);
                if ($selectedDate->isWeekend()) {
                    $fail('No se pueden agendar citas los fines de semana.');
                }
                
                $hour = $selectedDate->hour;
                if ($hour < 9 || $hour >= 18) {
                    $fail('El horario de atención es de 9:00 am a 6:00 pm.');
                }
            }
        ],
        'duracion' => 'required|integer|in:30,45,60,90',
        'notas' => 'nullable|string|max:500'
    ]);

    try {
        DB::beginTransaction();

        $duracion = (int)$validated['duracion'];
        $fechaCita = Carbon::parse($validated['fecha_cita']);

        $existingAppointment = CitaTerapia::where('id_terapeuta', $validated['id_terapeuta'])
            ->where(function($query) use ($fechaCita, $duracion) {
                $query->whereBetween('fecha_cita', [
                    $fechaCita->copy()->subMinutes($duracion),
                    $fechaCita->copy()->addMinutes($duracion)
                ]);
            })
            ->first();

        if ($existingAppointment) {
            throw new \Exception('El terapeuta ya tiene una cita programada en ese horario.');
        }

        $cita = CitaTerapia::create([
            'id_usuario' => Session::get('sesionidu'),
            'id_terapeuta' => $validated['id_terapeuta'],
            'fecha_cita' => $fechaCita,
            'duracion' => $duracion,
            'notas' => $validated['notas'] ?? null,
            'estado' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::commit();

        $terapeuta = Terapeuta::find($validated['id_terapeuta']);
        $fechaFormateada = $fechaCita->format('d/m/Y H:i');

        return redirect()->route('terapias')
               ->with('success', '✅ Cita programada exitosamente')
               ->with('cita_data', [
                   'fecha' => $fechaFormateada,
                   'terapeuta' => $terapeuta->nombre_terapeuta,
                   'duracion' => $duracion
               ]);

    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Error al guardar cita: '.$e->getMessage()."\n".$e->getTraceAsString());
        
        return back()
            ->withInput()
            ->with('error', '❌ Error al guardar la cita: '.$e->getMessage());
    }
}

    private function getDisponibilidadAleatoria()
    {
        $disponibilidades = [
            'Disponibilidad inmediata',
            'Disponible en 1-3 días',
            'Disponible la próxima semana'
        ];
        return $disponibilidades[array_rand($disponibilidades)];
    }
}
