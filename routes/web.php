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
    return redirect()->route('usuario.create');
});

Route::resource('usuario', UsuarioController::class)->only(['create', 'store']);
Route::resource('tarefa', TarefaController::class)->except(['show']);
Route::get('/login', [UsuarioController::class, 'logar'])->name('logar');
Route::post('/login', [UsuarioController::class, 'login'])->name('login');