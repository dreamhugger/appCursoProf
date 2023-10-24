<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function mostrarFormCategoria(){
        return view('cad_categoria');
    }

    public function mostrarManipulaCategoria(){
        $registrosCategoria = Categoria::All();
       
        return view('manipula_categoria',['registrosCategoria' => $registrosCategoria]);
    }

    public function index(){
        return view('index');
    }

    public function cadastroCategoria(Request $request){
       $registrosCategoria = $request->validate([
        'nomecategoria' => 'string|required'
       ]);
       
       Categoria::create($registrosCategoria);

       return Redirect::route('index');

    }

}
