<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;

Route::get('/', [IndexController::class,'index']);

//login
Route::post('logout', [LoginController::class, 'logout']);
Route::get('/login', [LoginController::class, 'redirectToProvider']);
Route::get('/callback', [LoginController::class, 'handleProviderCallback']);

//Rotas Obrigatoria
Route::resource('/pedidos', PedidoController::class);


