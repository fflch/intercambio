<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DiscenteController;
use App\Http\Controllers\DiscenteOptController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;



//login
Route::post('logout', [LoginController::class, 'logout']);
Route::get('/login', [LoginController::class, 'redirectToProvider']);
Route::get('/callback', [LoginController::class, 'handleProviderCallback']);

//Rotas Obrigatoria
Route::resource('/Discente', DiscenteController::class);

//Rotas Optativa
Route::resource('/DiscenteOpt', DiscenteOptController::class);


