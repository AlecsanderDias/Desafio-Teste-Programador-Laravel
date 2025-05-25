@extends('home')

@section('titulo', isset($tarefa) ? "Editar Tarefa" : "Criar Tarefa")

@section('conteudo')
    <form action="{{ isset($tarefa) ? route('tarefa.update', $tarefa->id) : route('tarefa.store') }}" method="POST">
        @csrf
        @if(isset($tarefa))
            @method('PUT')
        @endif
        <label for="titulo">Título (máximo 30 caracteres): </label><br>
        <input type="text" id="titulo" name="titulo" maxlength="30" value="{{ isset($tarefa) ? $tarefa->titulo : "" }}"><br>
        <label for="descricao">Descrição: (máximo 300 caracteres)</label><br>
        <textarea type="text" id="descricao" name="descricao">{{ isset($tarefa) ? $tarefa->descricao : "" }}</textarea><br>
        <label for="status">Status: </label><br>
        <select name="status" id="status"><br>
            @foreach (Constants::Status as $key => $value)
                <option value="{{ $key }}" @if(isset($tarefa)) @if($key == $tarefa->status) selected @endif @endif>{{ $value }}</option>
            @endforeach
        </select>
        <button type="submit">{{isset($tarefa) ? "Salvar" : "Criar"}}</button>
    </form>
@endsection