<?php

namespace App\Http\Controllers;

use App\Receta;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        //Obtiene las recetas mas nuevas
        $nuevas = Receta::latest()->take(5)->get();
        return view('inicio.index',compact('nuevas'));
    }
}
