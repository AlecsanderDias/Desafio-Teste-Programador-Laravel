@extends('home')

@section('titulo', isset($tarefa) ? "Editar Tarefa" : "Criar Tarefa")

@section('conteudo')
    <form class="py-3" action="{{ isset($tarefa) ? route('tarefa.update', $tarefa->id) : route('tarefa.store') }}" method="POST">
        @csrf
        @if(isset($tarefa))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="titulo">Título: (máximo 30 caracteres) </label>
            <input class="form-control" type="text" id="titulo" name="titulo" maxlength="30" value="{{ isset($tarefa) ? $tarefa->titulo : "" }}">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição: (máximo 50 caracteres)</label>
            <textarea class="form-control" type="text" id="descricao" name="descricao">{{ isset($tarefa) ? $tarefa->descricao : "" }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status: </label>
            <select class="form-control" name="status" id="status">
                @foreach (Constants::Status as $key => $value)
                    <option value="{{ $key }}" @if(isset($tarefa)) @if($key == $tarefa->status) selected @endif @endif>{{ $value }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary" type="submit">{{isset($tarefa) ? "Salvar" : "Criar"}}</button>
    </form>
    <p>Voltar para listagem de <a href="{{  route('tarefa.index') }}">tarefas</a></p>
@endsection