<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\ExameController;
use App\Http\Controllers\ParametroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AvaliacaoController;
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

Route::resource("turma", TurmaController::class);
Route::resource("tipo", TipoController::class);
Route::resource("exame", ExameController::class);
Route::resource("parametro", ParametroController::class);
Route::resource("usuario", UsuarioController::class);
Route::resource("avaliacao", AvaliacaoController::class);

Route::get('/usuario/{usuario?}/feedback', [UsuarioController::class, 'feedback'])->name('usuario.feedback');

//Rotas de Turma
/*
Route::get('/turma', [TurmaController::class, 'index'])->name('turma.index');
Route::get('/turma/create', [TurmaController::class, 'create'])->name('turma.create');
Route::post('/turma', [TurmaController::class, 'store'])->name('turma.store');
Route::get('/turma/{turma?}/edit', [TurmaController::class, 'edit'])->name('turma.edit');
Route::put('/turma/{turma?}', [TurmaController::class, 'update'])->name('turma.update');
Route::delete('/turma/{turma?}', [TurmaController::class, 'destroy'])->name('turma.destroy');
*/
//Rotas de Tipo
/*
Route::get('/tipo', [TipoController::class, 'index'])->name('tipo.index');
Route::get('/tipo/create', [TipoController::class, 'create'])->name('tipo.create');
Route::post('/tipo', [TipoController::class, 'store'])->name('tipo.store');
Route::get('/tipo/{tipo?}/edit', [TipoController::class, 'edit'])->name('tipo.edit');
Route::put('/tipo/{tipo?}', [TipoController::class, 'update'])->name('tipo.update');
Route::delete('/tipo/{tipo?}', [TipoController::class, 'destroy'])->name('tipo.destroy');
*/
//Rotas de Exame
/*
Route::get('/exame', [ExameController::class, 'index'])->name('exame.index');
Route::get('/exame/create', [ExameController::class, 'create'])->name('exame.create');
Route::post('/exame', [ExameController::class, 'store'])->name('exame.store');
Route::get('/exame/{exame?}/edit', [ExameController::class, 'edit'])->name('exame.edit');
Route::put('/exame/{exame?}', [ExameController::class, 'update'])->name('exame.update');
Route::delete('/exame/{exame?}', [ExameController::class, 'destroy'])->name('exame.destroy');
*/
//Rotas de Parametro
/*
Route::get('/parametro', [ParametroController::class, 'index'])->name('parametro.index');
Route::get('/parametro/create', [ParametroController::class, 'create'])->name('parametro.create');
Route::post('/parametro', [ParametroController::class, 'store'])->name('parametro.store');
Route::get('/parametro/{parametro?}/edit', [ParametroController::class, 'edit'])->name('parametro.edit');
Route::put('/parametro/{parametro?}', [ParametroController::class, 'update'])->name('parametro.update');
Route::delete('/parametro/{parametro?}', [ParametroController::class, 'destroy'])->name('parametro.destroy');
*/
//Rotas de Usuario
/*
Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario.index');
Route::get('/usuario/create', [UsuarioController::class, 'create'])->name('usuario.create');
Route::get('/usuario/{usuario?}', [UsuarioController::class, 'show'])->name('usuario.show');
Route::post('/usuario', [UsuarioController::class, 'store'])->name('usuario.store');
Route::get('/usuario/{usuario?}/edit', [UsuarioController::class, 'edit'])->name('usuario.edit');
Route::put('/usuario/{usuario?}', [UsuarioController::class, 'update'])->name('usuario.update');
Route::delete('/usuario/{usuario?}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');
*/
//Rotas de Avaliacao
/*
Route::get('/avaliacao', [AvaliacaoController::class, 'index'])->name('avaliacao.index');
Route::get('/avaliacao/create', [AvaliacaoController::class, 'create'])->name('avaliacao.create');
Route::get('/avaliacao/{avaliacao?}', [AvaliacaoController::class, 'show'])->name('avaliacao.show');
Route::post('/avaliacao', [AvaliacaoController::class, 'store'])->name('avaliacao.store');
Route::get('/avaliacao/{avaliacao?}/edit', [AvaliacaoController::class, 'edit'])->name('avaliacao.edit');
Route::put('/avaliacao/{avaliacao?}', [AvaliacaoController::class, 'update'])->name('avaliacao.update');
Route::delete('/avaliacao/{avaliacao?}', [AvaliacaoController::class, 'destroy'])->name('avaliacao.destroy');
*/