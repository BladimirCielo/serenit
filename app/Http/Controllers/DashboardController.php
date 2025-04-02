<?php

namespace App\Http\Controllers;
use App\Models\TipoEstadoAnimo;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    return view('index');
}

    public function estadoAnimo()
    {
        $tiposEstados = TipoEstadoAnimo::all();

        return view('estadoanimo', compact('tiposEstados'));
    }
}
