<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    public function mostrarFormCurso(){
        return view('cad_curso');
    }

    public function mostrarManipulaCurso(){
        $registrosCurso = Curso::All();
       
        return view('manipula_curso',['registrosCurso' => $registrosCurso]);
    }

    public function index(){
        return view('index');
    }

    public function cadastroCurso(Request $request){
       $registrosCurso = $request->validate([
        'nomecurso' => 'string|required',
        'cargahoraria' => 'string|required',
        'idcategoria' => 'numeric|required',
        'valor' => 'numeric|required'
       ]);
       
       Curso::create($registrosCurso);

       return Redirect::route('index');

    }

    public function deletarCurso(Curso $registrosCurso){
        $registrosCurso->delete();
        
        return Redirect::route('index');
    }

    public function buscarCursoNome(Request $request){
        $registrosCurso = Curso::query();
        $registrosCurso->when($request->curso,function($query, $valor){
            $query->where('nomecurso','like','%',$valor,'%');
        });
        $registrosCurso = $registrosCurso->get();
        return view('manipula_curso',['registrosCurso' => $registrosCurso]);
    }

    public function mostrarAlterarCurso(Curso $registrosCurso){
        return view('alterar_curso',['registrosCurso' => $registrosCurso]);
    }

    public function alterarBancoCurso(Curso $registrosCurso, Request $request){
        $registrosRequest = $request->validate([
            'nomecurso' => 'string|required',
            'cargahoraria' => 'string|required',
            'idcategoria' => 'numeric|required',
            'valor' => 'numeric|required'
        ]);

        $registrosCurso->fill($registrosRequest);
        $registrosCurso->save();

        //alert("Dados alterados com sucesso");
        return Redirect::route('index');
    }
}
