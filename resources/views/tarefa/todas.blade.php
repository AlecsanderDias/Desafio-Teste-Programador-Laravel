@extends('home')

@section('titulo', "Todas as Tarefas")

@section('conteudo')
    <form class="align-self-start pb-3" action="{{ route('filtroAdmin') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tituloAdm">Título</label>
            <input class="form-control" type="search" name="tituloAdm" id="tituloAdm" value="{{ $tituloAdm }}">
        </div>
        <div class="form-group">
            <label for="statusAdm">Status: </label>
            <select id="statusAdm" name="statusAdm">
                <option value="-1">Todos</option>
                @for ($i=0;$i<3;$i++)
                    <option value="{{$i}}" @if($statusAdm == $i) selected @endif>
                        {{ Constants::Status[$i] }}
                    </option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="usuarioId">Id Usuário</label>
            <input class="form-control" type="number" name="usuarioId" id="usuarioId" value="{{ $usuarioId }}" min="0" max="20">
        </div>
        <button class="btn btn-primary" type="submit">Filtrar</button>
    </form>
    <div class="w-100">
        <table class="table table-striped pb-5">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Status</th>
                    <th scope="col">Usuário Id</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tarefas as $tarefa)
                <tr>
                <th scope="row">{{ $tarefa->id }}</th>
                <td>{{ $tarefa->titulo }}</td>
                <td>{{ $tarefa->descricao }}</td>
                <td>{{ Constants::Status[$tarefa->status] }}</td>
                <td>{{ $tarefa->user_id }}</td>
                <td class="d-flex">
                    <a class="px-2 btn btn-primary" href="{{ route('tarefa.edit', ['tarefa' => $tarefa->id]) }}">Editar</a>
                    <form class="px-2" action="{{ route('tarefa.destroy', $tarefa->id) }}" method="POST">
                        @method ('DELETE')
                        @csrf
                        <input class="btn btn-primary" type="submit" value="Excluir">
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="h-25">
            {{ $tarefas->links() }}
        </div>
    </div>
    <a class="align-self-start btn btn-primary " href="{{ route('tarefa.index') }}">Suas Tarefas</a>
@endsection