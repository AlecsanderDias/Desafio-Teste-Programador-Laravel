@extends('home')

@section('titulo', "Suas Tarefas")

@section('conteudo')
    @if(auth()->user()->isAdmin)
        <a class="align-self-start btn btn-primary mb-3" href="{{ route('admin') }}">Todas as Tarefas</a>
    @endif
    <div class="align-self-start mb-2 ">
        <form action="{{ route('filtro') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">Título</label>
                <input class="form-control" type="search" name="titulo" id="titulo" value="{{ $titulo }}">
            </div>
            <div class="form-group">
                <label for="status">Status: </label>
                <select id="status" name="status">
                    <option value="-1">Todos</option>
                    @for ($i=0;$i<3;$i++)
                        <option value="{{$i}}" @if($status == $i) selected @endif>
                            {{ Constants::Status[$i] }}
                        </option>
                    @endfor
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Filtrar</button>
        </form>
    </div>
    <div class="w-100">
        <table class="table table-striped pb-5">
            <thead>
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody id="table">
                @foreach($tarefas as $key => $tarefa)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $tarefa->titulo }}</td>
                    <td>{{ $tarefa->descricao }}</td>
                    <td>{{ Constants::Status[$tarefa->status] }}</td>
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
    <a class="align-self-start btn btn-primary" href="{{ route('tarefa.create') }}">Criar Tarefa</a>
@endsection