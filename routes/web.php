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

// Rotas: Em Elaboração -> Análise
Route::post('/analise/{pedido}', [WorkflowController::class, 'analise']);
Route::patch('/deferimento/{pedido}', [WorkflowController::class, 'deferimento']);

// loginAs
Route::get('loginas', [LoginController::class, 'loginAsForm']);
Route::post('loginas', [LoginController::class, 'loginAs']);

// settings
Route::get('/settings', [GeneralSettingsController::class, 'show']);
Route::post('/settings', [GeneralSettingsController::class, 'update']);

// Rotas genéricas
Route::post('/converte', [DisciplinaController::class, 'converte']);

# Logs  
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('can:admin');

