<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PedidoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\WorkflowController;
use App\Http\Controllers\GeneralSettingsController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\InstituicaoController;

Route::get('/', [IndexController::class,'index']);

// pedidos
Route::resource('/pedidos', PedidoController::class);
Route::get('/meus_pedidos', [PedidoController::class,'meus_pedidos']);
Route::post('/getinstituicao',[PedidoController::class,'getinstituicao'])
    ->name('pedidos.getinstituicao');

// disciplinas
Route::resource('/disciplinas', DisciplinaController::class);

//País
Route::resource('/country', CountryController::class);

//Instituicao
Route::resource('/instituicao', InstituicaoController::class);

// files
Route::get('/disciplinas/{disciplina}/showfile', [DisciplinaController::class, 'showfile']);
Route::get('/pedidos/{pedido}/showfile', [PedidoController::class, 'showfile']);

// Rotas: Update status do pedido Em Elaboração <-> Análise
Route::post('/update_status_pedido/{pedido}', [WorkflowController::class, 'updatePedidoStatus']);

// Rotas: Em Elaboração -> Análise
Route::post('/analise/{pedido}', [WorkflowController::class, 'analise']);

// Rotas: Análise -> Em Elaboração
Route::post('/em_elaboracao/{pedido}', [WorkflowController::class, 'emElaboracao']);

Route::patch('/deferimento/{pedido}', [WorkflowController::class, 'deferimento']);

// settings
Route::get('/settings', [GeneralSettingsController::class, 'show']);
Route::post('/settings', [GeneralSettingsController::class, 'update']);

// Rotas genéricas
Route::post('/converte', [DisciplinaController::class, 'converte']);

# Logs
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('can:admin');

// Rotas para avaliação do Deferimento Docente
Route::post('salvardocente/{disciplina}', [WorkflowController::class, 'salvardocente']);
Route::get('docente', [WorkflowController::class,'docente']);
Route::get('show_parecer/{disciplina}', [WorkflowController::class,'show_parecer']);
Route::post('store_parecer/{disciplina}', [WorkflowController::class,'store_parecer']);

