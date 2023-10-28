<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Aula;

class AUlaController extends Controller
{
    public function mostrarFormAula(){
        return view('cad_Aula');
    }

    public function mostrarManipulaAula(){
        $registrosAula = Aula::All();
       
        return view('manipula_Aula',['registrosAula' => $registrosAula]);
    }

    public function index(){
        return view('index');
    }

    public function cadastroAula(Request $request){
       $registrosAula = $request->validate([
        'idcurso' => 'numeric|required',
        'tituloaula' => 'string|required',
        'urlaula' => 'string|required'
       ]);
       
       Aula::create($registrosAula);

       return Redirect::route('index');

    }

    public function deletarAula(Aula $registrosAula){
        $registrosAula->delete();
        
        return Redirect::route('index');
    }
}
