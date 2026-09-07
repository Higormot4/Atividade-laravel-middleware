<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/acesso', [AcessoController::class, 'index'])
    ->middleware('verificar.permissao');

    Route::fallback(function () {
    return response()->view('welcome', [], 404);
});