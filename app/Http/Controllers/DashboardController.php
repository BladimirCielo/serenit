<?php

namespace App\Http\Controllers;
use App\Models\TipoEstadoAnimo;
use App\Models\EstadoAnimo;
use App\Models\usuarios;
use App\Models\Terapeuta;
use App\Models\CitaTerapia;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

use Session;
use Carbon\Carbon;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if(Session::get('sesionidu')) {
            $idUsuario = session('sesionidu');
    
            $query = \DB::table('evento')
              ->select(
                  'id_evento', 
                  'id_usuario', 
                  'titulo', 
                  'descripcion',
                  'fecha'
              )
              ->where('id_usuario', '=', $idUsuario)
              ->where('fecha', '>=', \Carbon\Carbon::now()->subDays(7));
    
            $registrostasks = $query->orderBy('fecha', 'DESC')
              ->get();

            // Obtener solo los registros del usuario en sesión
            $general_options = [
                'chart_title' => 'Frecuencia de Estados de Ánimo',
                'report_type' => 'group_by_relationship',
                'model' => 'App\Models\EstadoAnimo',
                'relationship_name' => 'tipoEstadoAnimo',
                'group_by_field' => 'nombre_tipo',
                'aggregate_function' => 'count',
                'chart_type' => 'pie',
                'date_format' => 'l',
                'where_raw' => "id_usuario = $idUsuario"
            ];
            $generalchart = new LaravelChart($general_options);

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
    
            \View::share('registrostasks', $registrostasks);
            \View::share('generalchart', $generalchart);
            
            \View::share('sesiones_previas', $sesiones_previas);
            // dd($registrostasks);
            // return view ('calendarios.organizador', compact('registrostasks'));
            return view('index');
          }
          else {
              Session::flash('mensaje', "Es necesario iniciar sesión");
              return redirect()->route('login');   
          }
    }

    public function estadoAnimo()
    {
        $tiposEstados = TipoEstadoAnimo::all();

        return view('estadoanimo', compact('tiposEstados'));
    }
}
