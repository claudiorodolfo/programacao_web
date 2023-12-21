<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioControlador;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\UsuarioController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/bemvindo', function() {
    return view('welcome');
});

//Rotas de Turma
Route::get('/turma', [TurmaController::class, 'index'])->name('turma');

Route::get('/turma_criar', [TurmaController::class, 'create'])->name('turma_criar');
Route::post('/turma_armazenar', [TurmaController::class, 'store'])->name('turma_armazenar');

Route::get('/turma_editar/{turma?}', [TurmaController::class, 'edit'])->name('turma_editar');
Route::post('/turma_atualizar', [TurmaController::class, 'update'])->name('turma_atualizar');

Route::get('/turma_apagar/{turma?}', [TurmaController::class, 'destroy'])->name('turma_apagar');
//Rotas de Usuario
Route::get('/usuario', [UsuarioController::class, 'index']);
Route::get('/usuario_editar', [UsuarioController::class, 'edit']);