<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\ExameController;
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

//Rotas de Turma
Route::get('/turma', [TurmaController::class, 'index'])->name('turma');
Route::get('/turma_criar', [TurmaController::class, 'create'])->name('turma_criar');
Route::post('/turma_armazenar', [TurmaController::class, 'store'])->name('turma_armazenar');
Route::get('/turma_editar/{turma?}', [TurmaController::class, 'edit'])->name('turma_editar');
Route::post('/turma_atualizar', [TurmaController::class, 'update'])->name('turma_atualizar');

//Rotas de Tipo
Route::get('/tipo', [TipoController::class, 'index'])->name('tipo');
Route::get('/tipo_criar', [TipoController::class, 'create'])->name('tipo_criar');
Route::post('/tipo_armazenar', [TipoController::class, 'store'])->name('tipo_armazenar');
Route::get('/tipo_editar/{tipo?}', [TipoController::class, 'edit'])->name('tipo_editar');
Route::post('/tipo_atualizar', [TipoController::class, 'update'])->name('tipo_atualizar');
Route::get('/tipo_apagar/{tipo?}', [TipoController::class, 'destroy'])->name('tipo_apagar');

//Rotas de Exame
Route::get('/exame', [ExameController::class, 'index'])->name('exame');
Route::get('/exame_criar', [ExameController::class, 'create'])->name('exame_criar');
Route::post('/exame_armazenar', [ExameController::class, 'store'])->name('exame_armazenar');
Route::get('/exame_editar/{exame?}', [ExameController::class, 'edit'])->name('exame_editar');
Route::post('/exame_atualizar', [ExameController::class, 'update'])->name('exame_atualizar');
Route::get('/exame_apagar/{exame?}', [ExameController::class, 'destroy'])->name('exame_apagar');
//Rotas de Usuario
Route::get('/usuario', [UsuarioController::class, 'index']);
Route::get('/usuario_editar', [UsuarioController::class, 'edit']);