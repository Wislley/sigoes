<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\DiretorController;
use App\Http\Controllers\EscolaController;
use App\Http\Controllers\MedidaController;
use App\Http\Controllers\OcorrenciaController;
use App\Http\Controllers\TipoOcorrenciaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::middleware('role:admin')->group(function() {
        Route::resource('escolas', EscolaController::class);
        Route::resource('tipos_ocorrencia', TipoOcorrenciaController::class);
        Route::resource('medidas', MedidaController::class);
        Route::resource('diretores', DiretorController::class);
    });

    Route::middleware('role:diretor')->group(function() {
        Route::resource('alunos', AlunoController::class);
        Route::resource('ocorrencias', OcorrenciaController::class);
    });

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
