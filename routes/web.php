<?php
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ConteudoController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\RelatorioController;
use Illuminate\Support\Facades\Route;

Route::resource('usuarios', UsuarioController::class);
Route::resource('areas', AreaController::class);
Route::resource('conteudos', ConteudosController::class);
Route::resource('avaliacoes', AvaliacoesController::class);

Route::get('/relatorios/acessos', [RelatorioController::class, 'index'])->name('relatorios.index');
Route::get('/', function () {
    return view('home');
});
