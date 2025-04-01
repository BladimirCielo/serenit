<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoEstadoAnimo;
use App\Models\EstadoAnimo;
use App\Models\Recomendacion;
use App\Models\usuarios;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

use Session;
use Carbon\Carbon;


class moodcontroller extends Controller {
    
    // Descripción: Función que muestra la ventana de estado de ánimo, sólo si hay una sesión iniciada -->
    public function mood() {
        if(Session::get('sesionidu')) {

            $tiposEstados = TipoEstadoAnimo::orderby('id_tipo_estado_animo','asc')->get();
            return view('estadoanimo')->with('tiposEstados',$tiposEstados);
        }
        else {
            Session::flash('mensaje', "Es necesario iniciar sesión");
            return redirect()->route('login');   
        }
    }

    // Descripción: Función registra manualmente el estado de ánimo ingresado por el usuario -->
    public function registrarEstadoAnimo(Request $request) {
        $idUsuario = session('sesionidu'); 
        $request->validate([
            'fecha_registro' => 'nullable|date',
            'nota' => 'required'
        ]);

        // Inserción en la base de datos
        $estado = new EstadoAnimo();
        $estado->id_usuario = $idUsuario;
        $estado->id_tipo_estado_animo = $request->id_tipo_estado_animo;
        $estado->nota = $request->nota;
        $estado->fecha_registro = $request->fecha_registro ?? now();
        $estado->save();

        // return $estado;
    }

    // Descripción: Función que muestra el análisis de estado de ánimo, sólo si hay una sesión iniciada -->
    public function moodTrend() {
        if(Session::get('sesionidu')) {
            $idUsuario = session('sesionidu');
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
            // Gráfica para frecuencia de los últimos 7 días
            $week_options = [
                'chart_title' => 'Frecuencia de Estados de Ánimo (Últimos 7 días)',
                'report_type' => 'group_by_relationship',
                'model' => 'App\Models\EstadoAnimo',
                'relationship_name' => 'tipoEstadoAnimo',
                'group_by_field' => 'nombre_tipo',
                'aggregate_function' => 'count',
                'chart_type' => 'bar',
                'date_format' => 'l', 
                'where_raw' => "id_usuario = $idUsuario AND fecha_registro >= '" . Carbon::now()->subDays(7)->toDateString() . "'", // Filtrar por los últimos 7 días
            ];
            // Gráfica para frecuencia del mes actual
            $actualmonth_options = [
                'chart_title' => 'Frecuencia de Estados de Ánimo (Mes Actual)',
                'report_type' => 'group_by_relationship',
                'model' => 'App\Models\EstadoAnimo',
                'relationship_name' => 'tipoEstadoAnimo',
                'group_by_field' => 'nombre_tipo',
                'aggregate_function' => 'count',
                'chart_type' => 'bar',
                'date_format' => 'l', 
                'where_raw' => "id_usuario = $idUsuario AND fecha_registro BETWEEN '" . Carbon::now()->startOfMonth()->toDateString() . "' AND '" . Carbon::now()->endOfMonth()->toDateString() . "'", // Filtrar por el mes actual
            ];
            // Gráfica para frecuencia del mes anterior
            $lastmonth_options = [
                'chart_title' => 'Frecuencia de Estados de Ánimo (Mes Anterior)',
                'report_type' => 'group_by_relationship',
                'model' => 'App\Models\EstadoAnimo',
                'relationship_name' => 'tipoEstadoAnimo',
                'group_by_field' => 'nombre_tipo',
                'aggregate_function' => 'count',
                'chart_type' => 'bar',
                'date_format' => 'l', 
                'where_raw' => "id_usuario = $idUsuario AND fecha_registro BETWEEN '" . Carbon::now()->subMonth()->startOfMonth()->toDateString() . "' AND '" . Carbon::now()->subMonth()->endOfMonth()->toDateString() . "'", // Filtrar por el mes anterior
            ];
            // Crear ambas gráficas
            $generalchart = new LaravelChart($general_options);
            $weekchartbar = new LaravelChart($week_options);
            $actualmonthchartbar = new LaravelChart($actualmonth_options);
            $lastmonthchartbar = new LaravelChart($lastmonth_options);
    
            // \DB::enableQueryLog(); 
            // $chartbar3 = new LaravelChart($chart3_options);
            // dd(\DB::getQueryLog());
    
            // Verifica que ambas gráficas tengan datos
            // dd($chartbar, $chartbar2);

            $query = \DB::table('estadoanimo AS e')
            ->join('tiposestados AS t', 'e.id_tipo_estado_animo', '=', 't.id_tipo_estado_animo')
            ->select(
                'e.id_estado', 
                'e.id_usuario', 
                'e.id_tipo_estado_animo', 
                \DB::raw("CONCAT(t.nombre_tipo, ' - ', e.nota) AS descmood"), 
                'e.fecha_registro', 
                't.descripcion'
            )
            ->where('e.id_usuario', '=', $idUsuario)
            ->where('e.fecha_registro', '>=', \Carbon\Carbon::now()->subDays(7)); // Filtra los últimos 7 días
        
            $registrosmood = $query->orderBy('e.fecha_registro', 'ASC')
                ->get();
    
            return view('analisisanimo', compact('generalchart', 'weekchartbar', 'actualmonthchartbar', 'lastmonthchartbar', 'registrosmood'));
        }
        else {
            Session::flash('mensaje', "Es necesario iniciar sesión");
            return redirect()->route('login');   
        }
    }
}

