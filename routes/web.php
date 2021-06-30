<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\WorkflowController;
use App\Http\Controllers\GeneralSettingsController;

Route::get('/', [IndexController::class,'index']);

// pedidos
Route::resource('/pedidos', PedidoController::class);
Route::get('/meus_pedidos', [PedidoController::class,'meus_pedidos']);

// disciplinas
Route::resource('/disciplinas', DisciplinaController::class);

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
