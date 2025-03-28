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
