<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FileDisciplinaController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\WorkflowController;

Route::get('/', [IndexController::class,'index']);

//login
Route::post('logout', [LoginController::class, 'logout']);
Route::get('/login', [LoginController::class, 'redirectToProvider']);
Route::get('/callback', [LoginController::class, 'handleProviderCallback']);

//Rotas Obrigatoria
Route::resource('/pedidos', PedidoController::class);
Route::resource('/disciplinas', DisciplinaController::class);

// files
Route::resource('files', FileController::class);
Route::resource('filesdisciplina', FileDisciplinaController::class);

// Rotas do workflow do projeto
Route::get('/pedidos/{pedido}/analise', [WorkflowController::class, 'analise']);
Route::get('/pedidos/{pedido}/retornar_analise', [WorkflowController::class, 'retornar_analise']);
Route::get('/pedidos/{pedido}/finalizado', [WorkflowController::class, 'finalizado']);

// Rotas do workflow da Disciplina