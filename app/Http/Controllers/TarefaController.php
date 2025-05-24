<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index() {
        $tarefas = Tarefa::all();
        // dd($tarefas);
        return view('tarefa.index', ['tarefas' => $tarefas]);
    }

    public function create() {
        return view('tarefa.create');
        // retornar view de formulário
    }

    public function store(Request $request) {
        $tarefa = new Tarefa($request->all());
        $tarefa->save();
        dd(Tarefa::all());
        redirect('home');
        // Validar e salvar dados do formulário
    }

    public function update(Request $request) {
        $id = 1;
        Tarefa::find($id)->update($request->all());
        dd(Tarefa::find($id));
        redirect('home');
    }

    public function delete($id) {
        $tarefa = Tarefa::find($id);
        $tarefa->delete();
        dd(Tarefa::all());
        redirect('home');
    }
}
