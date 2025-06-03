@extends('home')

@section('titulo', "Criar Usuário")

@section('conteudo')
    <form class="py-3" action="{{ route('usuario.store') }}" method="POST">
        @csrf
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
        <div class="form-group">
            <label for="role">Cargo: </label>
            <select class="form-control" name="role" id="role">
                <option value="0" selected >Usuário</option>
                <option value="1">Administrador</option>
            </select>
        </div>
        <button class="btn btn-primary" type="submit">Criar</button>
    </form>
    <a class="btn btn-primary" href="{{  route('usuario.index') }}">Usuários</a>
@endsection