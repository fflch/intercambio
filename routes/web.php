<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\DisciplinaController;

Route::get('/', [IndexController::class,'index']);

//login
Route::post('logout', [LoginController::class, 'logout']);
Route::get('/login', [LoginController::class, 'redirectToProvider']);
Route::get('/callback', [LoginController::class, 'handleProviderCallback']);

//Rotas Obrigatoria
Route::resource('/pedidos', PedidoController::class);
Route::resource('/disciplinas', DisciplinaController::class);

//files
Route::resource('files', FileController::class);