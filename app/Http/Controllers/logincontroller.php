<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuarios;

use Session;

class logincontroller extends Controller {
    
    // Descripción: Función que muestra la vista del login. -->
    public function login() {
        return view ('login');
    }
    
    // Descripción: Función que muestra la página principal del sistema si se encuentra una sesión. -->
    public function inicio()
    {
        if(Session::get('sesionidu'))
        {
        return view ('index');
        }
        else{
            Session::flash('mensaje', "Es necesario iniciar sesion");
            return redirect()->route('login');   
        }
    }

    // Descripción: Función que valida las credenciales de acceso de sesiones. -->
    public function validar(Request $request) { 
        $validated = $request->validate([
            'email' => 'required',
            'contrasenia' => 'required'
        ]);
    
        $email = $request->email;
        $contrasenia = $request->contrasenia;
        
        // Buscar el usuario en la base de datos
        $usuario = usuarios::where('email', '=', $email)->first();
    
        if ($usuario) {
            // Verificar si la contraseña coincide
            if ($usuario->contrasenia == $contrasenia) {
                // La contraseña es correcta
                Session::put('sesionname', $usuario->nombre . ' ' . $usuario->apellido_pat);
                Session::put('sesionidu', $usuario->id_usuario);
                return redirect()->route('inicio');
            } else {
                // La contraseña no coincide
                Session::flash('mensaje', "Contraseña incorrecta.");
                return redirect()->route('login');
            }
        } else {
            // El usuario no se encontró en la base de datos
            Session::flash('mensaje', "El usuario no existe.");
            return redirect()->route('login');
        }
    }

    // Descripción: Función que cierra la sesión activa. -->
    public function cerrarsesion() {
        Session::forget('sesionname');
        Session::forget('sesionidu');
        Session::flush();
        Session::flash('mensaje', 'Session Cerrada Correctamente');
        return redirect()->route('login');
     }

    public function mood()
    {
        return view ('estadoanimo');
    }

    public function organizador()
    {
        return view ('calendarios.organizador');
    }

    public function calendar()
    {
        return view ('calendario');
    }


}
