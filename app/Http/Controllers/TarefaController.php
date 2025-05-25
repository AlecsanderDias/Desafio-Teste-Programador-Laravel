<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index() {
        $tarefas = Tarefa::all();
        // dd($tarefas);
        return view('tarefa.gerenciar', ['tarefas' => $tarefas]);
    }

    public function create() {
        $isCreate = true;
        return view('tarefa.formulario', ['isCreate' => $isCreate]);
    }

    public function store(Request $request) {
        $tarefa = new Tarefa($request->all());
        $tarefa->usuario_id = 1;
        $tarefa->save();
        return redirect()->route('tarefa.index');
    }

    public function edit($id) {
        $isCreate = false;
        $tarefa = Tarefa::find($id);
        return view('tarefa.formulario', ['isCreate' => $isCreate, 'tarefa' => $tarefa]);
    }

    public function update(Request $request, $id) {
        Tarefa::find($id)->update($request->all());
        // dd(Tarefa::find($id));        
        return redirect()->route('tarefa.index');
    }

    public function destroy($id) {
        $tarefa = Tarefa::find($id);
        $tarefa->delete();
        // dd(Tarefa::all());
        return redirect()->route('tarefa.index');
    }
}
