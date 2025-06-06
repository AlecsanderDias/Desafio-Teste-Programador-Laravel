@extends('home')

@section('titulo', 'Editar Usuário')

@section('conteudo')
    <form class="py-3" action="{{ route('usuario.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nome (máximo 30 caracteres): </label>
            <input class="form-control" type="text" id="name" name="name" maxlength="30" value="{{ $usuario->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email (máximo 30 caracteres): </label>
            <input class="form-control" type="email" id="email" name="email" maxlength="30" value="{{ $usuario->email }}">
        </div>
        <div class="form-group">
            <label for="password">Nova Senha (máximo 30 caracteres): </label>
            <input class="form-control" type="password" id="password" name="password" maxlength="30">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirme a Nova Senha: </label>
            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" maxlength="30">
        </div>
        <div class="form-group">
            <label for="role">Cargo: </label>
            <select class="form-control" name="role" id="role">
                <option value="0" @if($usuario->isAdmin) selected @endif>Usuário</option>
                <option value="1" @if($usuario->isAdmin) selected @endif>Administrador</option>
            </select>
        </div>
        <button class="btn btn-primary" type="submit">Salvar Alterações</button>
    </form>
    <a href="{{  route('usuario.index') }}">Usuários</a>
@endsection