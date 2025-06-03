@extends('home')

@section('titulo', '??? Usuário')

@section('conteudo')
    <form class="py-3" action="{{ isset($tarefa) ? route('usuario.update', $tarefa->id) : route('tarefa.store') }}" method="POST">
        @csrf
        @if(isset($tarefa))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Nome (máximo 30 caracteres): </label>
            <input class="form-control" type="text" id="name" name="name" maxlength="30">
        </div>
        <div class="form-group">
            <label for="email">Email (máximo 30 caracteres): </label>
            <input class="form-control" type="email" id="email" name="email" maxlength="30">
        </div>
        <div class="form-group">
            <label for="password">Senha (máximo 30 caracteres): </label>
            <input class="form-control" type="password" id="password" name="password" maxlength="30">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirme a Senha: </label>
            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" maxlength="30">
        </div>
        <button class="btn btn-primary" type="submit">Criar</button>
        <button class="btn btn-primary" type="submit">{{isset($tarefa) ? "Salvar" : "Criar"}}</button>
    </form>
    <a href="{{  route('usuario.index') }}">Usuários</a>
@endsection