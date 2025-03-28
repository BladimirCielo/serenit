<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logincontroller extends Controller {
    
    public function login() {
        return view ('login');
    }
    
    public function inicio()
    {
        return view ('index');
    }
    public function animo()
    {
        return view ('estadoanimo');
    }

    public function calendario()
    {
        return view ('calendario.organizador');
    }

    


}
