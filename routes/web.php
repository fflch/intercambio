<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FileController;
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
Route::get('/disciplinas/{disciplina}/showfile', [DisciplinaController::class, 'showfile']);

// Rotas do workflow do projeto
Route::get('/pedidos/{pedido}/analise', [WorkflowController::class, 'analise']);
Route::get('/pedidos/{pedido}/retornar_analise', [WorkflowController::class, 'retornar_analise']);
Route::get('/pedidos/{pedido}/finalizado', [WorkflowController::class, 'finalizado']);

// Rotas do workflow da Disciplina

Route::get('/disciplinas/{disciplina}/analise_disciplina', [WorkflowController::class, 'analise_disciplina']);
Route::get('/disciplinas/{disciplina}/comissao_graduacao', [WorkflowController::class, 'comissao_graduacao']);
Route::get('/disciplinas/{disciplina}/servico_graduacao', [WorkflowController::class, 'servico_graduacao']);
Route::get('/disciplinas/{disciplina}/docente', [WorkflowController::class, 'docente']);
Route::get('/disciplinas/{disciplina}/finalizacao', [WorkflowController::class, 'finalizacao']);

Route::get('/disciplinas/{disciplina}/retornar_analise_disciplina', [WorkflowController::class, 'retornar_analise_disciplina']);
Route::get('/disciplinas/{disciplina}/retornar_comissao_graduacao', [WorkflowController::class, 'retornar_comissao_graduacao']);
Route::get('/disciplinas/{disciplina}/retornar_servico_graduacao', [WorkflowController::class, 'retornar_servico_graduacao']);
Route::get('/disciplinas/{disciplina}/retornar_docente', [WorkflowController::class, 'retornar_docente']);


// Rota provisoria dos tipos

Route::get('/pedidos/{pedido}/index_type', [PedidoController::class, 'index_type']);

# loginAs
Route::get('loginas', [LoginController::class, 'loginAsForm']);
Route::post('loginas', [LoginController::class, 'loginAs']);



