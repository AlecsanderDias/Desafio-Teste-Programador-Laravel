<?php

use App\Http\Controllers\TarefaController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/', function () {
    return redirect()->route('login');
});
Route::post('/cadastrar', [UsuarioController::class, 'cadastrar'])->name('cadastrar');
Route::get('/cadastro',[UsuarioController::class, 'cadastro'])->name('cadastro');
Route::get('/login', [UsuarioController::class, 'logar'])->name('login');
Route::post('/login', [UsuarioController::class, 'login']);
Route::post('/logout', [UsuarioController::class, 'logout'])->middleware('auth')->name('logout');
Route::resource('tarefa', TarefaController::class)->middleware('auth')->except(['index','show']);
Route::get('/tarefa', [TarefaController::class, 'index'])->middleware('auth')->name('tarefa.index');
Route::get('/admin', [TarefaController::class, 'admin'])->middleware('isAdmin')->name('admin');
Route::post('/filtroAdm', [TarefaController::class, 'filtroAdmin'])->middleware('isAdmin')->name('filtroAdmin');
Route::post('/filtro', [TarefaController::class, 'filtro'])->name('filtro');
Route::get('/admin/user', [UsuarioController::class, 'admin'])->middleware('isAdmin')->name('admin.usuarios');