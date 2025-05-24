@extends('home')

@section('titulo','Criar Tarefa')

@section('conteudo')
    <ul>
    @foreach($tarefas as $tarefa)
        <li>{{ "$tarefa->titulo, $tarefa->descricao, $tarefa->status " }}</li>
    @endforeach
    </ul>
@endsection