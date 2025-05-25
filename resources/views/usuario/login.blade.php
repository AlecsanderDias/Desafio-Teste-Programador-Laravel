@extends('home')

@section('titulo', "Login")

@section('conteudo')
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="email">Email (máximo 30 caracteres): </label><br>
        <input type="email" id="email" name="email" maxlength="30"><br>
        <label for="senha">Senha (máximo 30 caracteres): </label><br>
        <input type="password" id="senha" name="senha" maxlength="30"><br>
        <button type="submit">Entrar</button>
    </form>
@endsection