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

//rotas para alterar categoria
Route::get('/alterar-categoria/{registrosCategoria}',[CategoriaController::class,'MostrarAlterarCategoria'])->name('alterar-categoria');




//rotas para visualizar e cadastrar o curso
Route::get('/cadcurso',[CursoController::class,'mostrarFormCurso'])->name("form-cadastro-curso");
Route::post('/cadcurso',[CursoController::class,'cadastroCurso'])->name("cadastro-curso");

Route::get('/manipulacurso',[CursoController::class,'mostrarManipulaCurso'])->name("manipula-curso");

//rotas para visualizar e cadastrar a aula
Route::get('/cadaula',[AulaController::class,'mostrarFormAula'])->name("form-cadastro-aula");
Route::post('/cadaula',[AulaController::class,'cadastroAula'])->name("cadastro-aula");

Route::get('/manipulaaula',[AulaController::class,'mostrarManipulaAula'])->name("manipula-aula");