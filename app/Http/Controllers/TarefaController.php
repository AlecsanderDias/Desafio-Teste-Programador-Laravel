<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Http\Requests\TarefaFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TarefaController extends Controller
{
    public function index() {
        $tarefas = Tarefa::where('user_id','=',auth()->user()->id)->paginate(2);
        return view('tarefa.gerenciar', ['tarefas' => $tarefas]);
    }

    public function create() {
        $isCreate = true;
        return view('tarefa.formulario', ['isCreate' => $isCreate]);
    }

    public function store(TarefaFormRequest $request) {
        $tarefa = new Tarefa($request->all());
        $tarefa->user_id = auth()->user()->id;
        $tarefa->save();
        return redirect()->route('tarefa.index')->with(['success' => 'Tarefa criada com sucesso!']);
    }

    public function edit($id) {
        if(auth()->user()->id !== Tarefa::find($id)->user_id && !auth()->user()->isAdmin) return redirect()->route('tarefa.index');
        $isCreate = false;
        $tarefa = Tarefa::find($id);
        return view('tarefa.formulario', ['isCreate' => $isCreate, 'tarefa' => $tarefa]);
    }

    public function update(TarefaFormRequest $request, $id) {
        Tarefa::find($id)->update($request->all());
        return redirect()->route('tarefa.index')->with(['success' => 'Tarefa atualizada com sucesso!']);
    }

    public function destroy($id) {
        $tarefa = Tarefa::find($id);
        $tarefa->delete();
        return redirect()->route('tarefa.index')->with(['success' => 'Tarefa deletada com sucesso!']);
    }

    public function admin() {
        $tarefas = Tarefa::paginate(2);
        return view('tarefa.todas', ['tarefas' => $tarefas]);
    }
}
