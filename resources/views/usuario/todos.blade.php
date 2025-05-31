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
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <th scope="row">{{ $usuario->id }}</th>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->deleted_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection