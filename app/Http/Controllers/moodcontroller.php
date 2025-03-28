<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoEstadoAnimo;
use App\Models\EstadoAnimo;


use Session;

class moodcontroller extends Controller {
    
    // Descripción: Función que muestra la ventana de estado de ánimo, sólo si hay una sesión iniciada -->
    public function mood()
    {
        if(Session::get('sesionidu')) {

            $tiposEstados = TipoEstadoAnimo::orderby('id_tipo_estado_animo','asc')->get();

            return view('estadoanimo')->with('tiposEstados',$tiposEstados);
        }
        else {
            Session::flash('mensaje', "Es necesario iniciar sesión");
            return redirect()->route('login');   
        }
    }

    public function registrarEstadoAnimo(Request $request)
    {
        // Obtener el ID del usuario desde la sesión
        $idUsuario = session('sesionidu'); 

        // Validación de los datos
        $request->validate([
            // 'id_tipo_estado_animo' => 'required|exists:TipoEstadoAnimo,id_tipo_estado_animo',
            'fecha_registro' => 'nullable|date',
            'nota' => 'required'
        ]);

        // Inserción en la base de datos
        $estado = new EstadoAnimo();
        $estado->id_usuario = $idUsuario;
        $estado->id_tipo_estado_animo = $request->id_tipo_estado_animo;
        $estado->nota = $request->nota;
        $estado->fecha_registro = $request->fecha_registro ?? now();

        // return $estado;
        $estado->save();

        return response()->json([
            'message' => 'Estado de ánimo registrado correctamente.',
            'estado' => $estado
        ]);
    }

}
