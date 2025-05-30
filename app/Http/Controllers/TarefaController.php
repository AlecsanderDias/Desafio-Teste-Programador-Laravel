<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Http\Requests\TarefaFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TarefaController extends Controller
{
    public function index() {
        $titulo = session('titulo');
        $status = session('status');
        $pagination = 2;
        $filtros = [];
        if($titulo != "" and $titulo != null) $filtros[] = ['titulo','LIKE', '%'.$titulo.'%'];
        if($status >= 0 and $status != null) $filtros[] = ['status', '=', $status];
        if(count($filtros) != 0) {
            $tarefas = Tarefa::where('user_id','=',auth()->user()->id)->where($filtros)->paginate(env('USER_PAGINATION', $pagination));
        } else {
            $tarefas = Tarefa::where('user_id','=',auth()->user()->id)->paginate(env('USER_PAGINATION', $pagination));
        }
        return view('tarefa.gerenciar', ['tarefas' => $tarefas, 'titulo' => $titulo, 'status' => $status]);
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
        $titulo = session('tituloAdm');
        $status = session('statusAdm');
        $nome = session('nome');
        // $usuarioId = session('usuarioId');
        $pagination = 5;
        $filtros = [];
        if($titulo != "" and $titulo != null) $filtros[] = ['titulo','LIKE', '%'.$titulo.'%'];
        if($status >= 0 and $status != null) $filtros[] = ['status', '=', $status];
        if($nome != "" and $nome != null) $filtros[] = ['users.name','LIKE', '%'.$nome.'%'];
        $tarefas = Tarefa::join('users','users.id','=','tarefas.user_id')
                ->select('tarefas.*','users.name')
                ->where($filtros)
                ->paginate(env('ADMIN_PAGINATION', $pagination));
        return view('tarefa.todas', ['tarefas' => $tarefas, 'tituloAdm' => $titulo, 'statusAdm' => $status, 'nome' => $nome]);
    }

    public function filtro(Request $request) {
        session(['status' => $request->input('status')]);
        session(['titulo' => $request->input('titulo')]);
        return redirect()->route('tarefa.index');
    }

    public function filtroAdmin(Request $request) {
        session(['statusAdm' => $request->input('statusAdm')]);
        session(['tituloAdm' => $request->input('tituloAdm')]);
        // session(['usuarioId' => $request->input('usuarioId')]);
        session(['nome' => $request->input('nome')]);
        return redirect()->route('admin');
    }
}
