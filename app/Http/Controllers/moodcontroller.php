<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

class moodcontroller extends Controller {
    
    // Descripción: Función que muestra la ventada de estado de ánimo, sólo si hay una sesión iniciada -->
    public function mood()
    {
        if(Session::get('sesionidu')) {
            return view ('estadoanimo');
        }
        else {
            Session::flash('mensaje', "Es necesario iniciar sesión");
            return redirect()->route('login');   
        }
    }

}
