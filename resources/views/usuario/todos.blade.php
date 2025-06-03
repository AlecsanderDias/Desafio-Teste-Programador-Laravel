@extends('home')

@section('titulo', "Todos os usuários")

@section('conteudo')
    <div class="w-100">
        <table class="table table-striped pb-5">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Deletado</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <th scope="row">{{ $usuario->id }}</th>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        @if ($usuario->deleted_at != null)
                            <p class="btn btn-success">Sim</p>
                        @else  
                            <p class="btn btn-danger">Não</p>
                        @endif
                    </td>
                    <td class="d-flex">
                        <a class="px-2 btn btn-primary" href="{{ route('usuario.edit', $usuario->id) }}">Editar</a>
                        <form class="px-2" action="{{ route('usuario.destroy', $usuario->id) }}" method="POST">
                            @method ('DELETE')
                            @csrf
                            <input class="btn btn-primary" type="submit" value="Excluir">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection