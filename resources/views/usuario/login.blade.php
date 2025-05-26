@extends('home')

@section('titulo', "Login")

@section('conteudo')
    <form class="py-3" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email (máximo 30 caracteres): </label>
            <input class="form-control" type="email" id="email" name="email" maxlength="30" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="password">Senha (máximo 30 caracteres): </label>
            <input class="form-control" type="password" id="password" name="password" maxlength="30">
        </div>
        <button class="btn btn-primary" type="submit">Entrar</button>
    </form>
    <p>Não tem uma conta <a href="{{ route('cadastro') }}">cadastre-se</a></p>
@endsection