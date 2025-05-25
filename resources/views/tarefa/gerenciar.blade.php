@extends('home')

@section('titulo', "Todas as Tarefas")

@section('conteudo')
    <ul>
    @foreach($tarefas as $tarefa)
        <li>
            <p>
                {{ "$tarefa->titulo, $tarefa->descricao, $tarefa->status " }}
            </p>
            <button>
                <a href="{{ route('tarefa.edit', ['tarefa' => $tarefa->id]) }}">Editar</a>
            </button>
            <form action="{{ route('tarefa.destroy', $tarefa->id) }}" method="POST">
                @method ('DELETE')
                @csrf
                <input type="submit" value="Excluir">
            </form>
        </li>
    @endforeach
    </ul>
    <button>
        <a href="{{ route('tarefa.create') }}">Criar Tarefa</a>
    </button>
    <button>
        <a href="{{ route('logar') }}">Login</a>
    </button>
@endsection