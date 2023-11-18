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

    public function deletarCategoria(Categoria $registrosCategoria){
        $registrosCategoria->delete();
        
        return Redirect::route('index');
    }

    public function buscarCategoriaNome(Request $request){
        $registrosCategoria = Categoria::query();
        $registrosCategoria->when($request->categoria,function($query, $valor){
            $query->where('nomecategoria','like','%',$valor,'%');
        });
        $registrosCategoria = $registrosCategoria->get();
        return view('manipula_categoria',['registrosCategoria' => $registrosCategoria]);
    }

    public function mostrarAlterarCategoria(Categoria $registrosCategoria){
        return view('alterar_categoria',['registrosCategoria' => $registrosCategoria]);
    }

    public function alterarBancoCategoria(Categoria $registrosCategoria, Request $request){
        $registrosRequest = $request->validate([
            'nomecategoria' => 'string|required'
        ]);

        $registrosCategoria->fill($registrosRequest);
        $registrosCategoria->save();

        //alert("Dados alterados com sucesso");
        return Redirect::route('index');
    }
}
