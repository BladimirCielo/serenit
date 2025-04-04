<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuarios;
use App\Models\carreras;

use Session;

class logincontroller extends Controller {
    
    // Descripción: Función que muestra la vista del login. -->
    public function login() {
        $carreras = carreras::orderby('nombre_carrera', 'asc')
            ->get();

        return view ('login')
            ->with('carreras', $carreras);
    }
    
    // Descripción: Función que muestra la página principal del sistema si se encuentra una sesión. -->
    public function inicio()
    {
        if(Session::get('sesionidu'))
        {
        return view ('index');
        }
        else{
            Session::flash('mensaje', "Es necesario iniciar sesión");
            return redirect()->route('login');   
        }
    }

    // Descripción: Función que valida las credenciales de acceso de sesiones. -->
    public function validar(Request $request) { 
        $validated = $request->validate([
            'email_signin' => 'required|email',
            'contrasenia_signin' => 'required'
        ], [
            'email_signin.required' => 'El correo electrónico es obligatorio.',
            'email_signin.email' => 'Por favor, ingresa un correo electrónico válido.',
            
            'contrasenia_signin.required' => 'La contraseña es obligatoria.'
        ]);
    
        $email = $request->email_signin;
        $contrasenia = $request->contrasenia_signin;
        
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
        Session::flash('mensaje', 'Sesión cerrada correctamente');
        return redirect()->route('login');
    }

    // Descripción: Función que inserta un nuevo usuario en la bd para crear cuenta nueva. -->
    public function crearusuario(Request $request) {
        $validated = $request->validate([
            'nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,í,ó,é,ú,ü,ñ,Ñ]+$/',
            'apellido_pat' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,í,ó,é,ú,ü,ñ,Ñ]+$/',
            'apellido_mat' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,í,ó,é,ú,ü,ñ,Ñ]+$/',
            'email' => 'required|email',
            'contrasenia' => 'required|min:8|confirmed|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&\-_])[A-Za-z\d@$!%*?&\-_]{8,}$/'
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.regex' => 'El nombre debe comenzar con una letra mayúscula y solo puede contener letras y espacios.',
            
            'apellido_pat.required' => 'El apellido paterno es obligatorio.',
            'apellido_pat.regex' => 'El apellido paterno debe comenzar con una letra mayúscula y solo puede contener letras y espacios.',
            
            'apellido_mat.required' => 'El apellido materno es obligatorio.',
            'apellido_mat.regex' => 'El apellido materno debe comenzar con una letra mayúscula y solo puede contener letras y espacios.',
            
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Por favor, ingrese un correo electrónico válido.',
            
            'contrasenia.required' => 'La contraseña es obligatoria.',
            'contrasenia.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'contrasenia.confirmed' => 'Las contraseñas no coinciden.',
            'contrasenia.regex' => 'La contraseña debe tener al menos una letra mayúscula, una letra minúscula, un número y un carácter especial ( @$!%*?&-_ ).'
        ]);

        $insertausuario = \DB::insert("INSERT INTO usuarios
        (nombre,apellido_pat,apellido_mat,email,username,contrasenia,created_at,updated_at,id_carrera)
        VALUE ('$request->nombre','$request->apellido_pat','$request->apellido_mat','$request->email','empty','$request->contrasenia',now(),now(),'$request->id_carrera')");

        $usuario = \DB::table('usuarios')->where('email', $request->email)->first();

        Session::put('sesionname', $usuario->nombre . ' ' . $usuario->apellido_pat);
        Session::put('sesionidu', $usuario->id_usuario);
        return redirect()->route('inicio');

    }
}
