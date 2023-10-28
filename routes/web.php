<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AulaController;

Route::get('/',[CategoriaController::class,'index'])->name('index');

//rotas para visualizar e cadastrar a categoria
Route::get('/cadcategoria',[CategoriaController::class,'mostrarFormCategoria'])->name("form-cadastro-categoria");
Route::post('/cadcategoria',[CategoriaController::class,'cadastroCategoria'])->name("cadastro-categoria");

//rotas para manipular categoria
Route::get('/manipulacategoria',[CategoriaController::class,'mostrarManipulaCategoria'])->name("manipula-categoria");

Route::get('/manipulacategoria',[CategoriaController::class,'buscarCategoriaNome'])->name("buscar-categoria-nome");

//rotas para alterar categoria
Route::get('/alterarcategoria/{registrosCategoria}',[CategoriaController::class,'mostrarAlterarCategoria'])->name("alterar-categoria");
Route::put('alterarbancocategoria/{registrosCategoria}',[CategoriaController::class,'alterarBancoCategoria'])->name("alterar-banco-categoria");

Route::delete('/deletarcategoria/{registrosCategoria}',[CategoriaController::class,'deletarCategoria'])->name("deletar-categoria");


//rotas para visualizar e cadastrar o curso
Route::get('/cadcurso',[CursoController::class,'mostrarFormCurso'])->name("form-cadastro-curso");
Route::post('/cadcurso',[CursoController::class,'cadastroCurso'])->name("cadastro-curso");

Route::get('/manipulacurso',[CursoController::class,'mostrarManipulaCurso'])->name("manipula-curso");

Route::get('/alterarcurso/{registrosCurso}',[CursoController::class,'mostrarAlterarCurso'])->name("alterar-curso");
Route::put('alterarbancocurso/{registrosCurso}',[CursoController::class,'alterarBancoCurso'])->name("alterar-banco-curso");

Route::delete('/deletarcurso/{registrosCurso}',[CursoController::class,'deletarCurso'])->name("deletar-curso");

//rotas para visualizar e cadastrar a aula
Route::get('/cadaula',[AulaController::class,'mostrarFormAula'])->name("form-cadastro-aula");
Route::post('/cadaula',[AulaController::class,'cadastroAula'])->name("cadastro-aula");

Route::get('/manipulaaula',[AulaController::class,'mostrarManipulaAula'])->name("manipula-aula");

Route::get('/alteraraula/{registrosAula}',[AulaController::class,'mostrarAlterarAula'])->name("alterar-aula");
Route::put('alterarbancoaula/{registrosAula}',[AulaController::class,'alterarBancoAula'])->name("alterar-banco-aula");

Route::delete('/deletaraula/{registrosAula}',[AulaController::class,'deletarAula'])->name("deletar-aula");